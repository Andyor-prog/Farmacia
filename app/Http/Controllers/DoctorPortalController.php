<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\ExpedienteMedico;
use App\Models\Medico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DoctorPortalController extends Controller
{
    private function medicoActual(): Medico
    {
        return Medico::where('id_usuario', Auth::guard('doctor')->id())->firstOrFail();
    }

    public function index(): View
    {
        $citas = Cita::with(['paciente', 'expediente'])
            ->where('medico_id', $this->medicoActual()->id_medico)
            ->orderByDesc('fecha')
            ->orderByDesc('hora')
            ->get();

        return view('doctor.dashboard', compact('citas'));
    }

    public function updateAppointment(Request $request, int $id): RedirectResponse
    {
        $data = $request->validate([
            'estado' => ['required', 'in:Pendiente,Confirmada,Completada,Cancelada'],
        ]);

        $cita = Cita::where('medico_id', $this->medicoActual()->id_medico)
            ->findOrFail($id);
        $cita->update($data);

        return redirect()->route('doctor.dashboard')->with('status', 'Estado de la cita actualizado.');
    }

    public function editExpediente(int $id): View
    {
        $cita = Cita::with(['paciente', 'expediente'])
            ->where('medico_id', $this->medicoActual()->id_medico)
            ->findOrFail($id);
        $expediente = $cita->expediente;

        return view('doctor.expedientes.edit', compact('cita', 'expediente'));
    }

    public function saveExpediente(Request $request, int $id): RedirectResponse
    {
        $data = $request->validate([
            'diagnostico' => ['required', 'string'],
            'tratamiento' => ['required', 'string'],
            'observaciones' => ['nullable', 'string'],
        ]);

        $cita = Cita::where('medico_id', $this->medicoActual()->id_medico)
            ->findOrFail($id);

        ExpedienteMedico::updateOrCreate(
            ['id_cita' => $cita->id_cita],
            [...$data, 'fecha' => now()]
        );

        return redirect()->route('doctor.dashboard')->with('status', 'Expediente médico guardado.');
    }
}
