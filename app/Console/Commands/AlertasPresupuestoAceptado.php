<?php

namespace App\Console\Commands;

use App\Models\Alerts\Alert;
use App\Models\Budgets\Budget;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AlertasPresupuestoAceptadoTareas extends Command
{
    protected $signature = 'Alertas:presupuestoAceptadoTareas';
    protected $description = 'Crear alertas de presupuesto Aceptado sin Tareas';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $pendientes = Budget::where('budget_status_id', 2)
        ->where('updated_at', '<=', Carbon::now()->subHours(24))
        ->get();

        foreach ($pendientes as $pendiente) {
            $alertExists  = Alert::where('reference_id', $pendiente->id)->where('status_id', 1)->exists();
            if(!$alertExists ){
                $alert = Alert::create([
                    'reference_id' => $pendiente->id,
                    'admin_user_id' => $pendiente->admin_user_id,
                    'status_id' => 3,
                    'activation_datetime' => Carbon::now(),
                    'cont_postpone' => 0,
                    'description' => 'Presupuesto ' . $pendiente->reference.' pendiente de Aceptar',
                ]);
            }
        }

        $this->info('Comando completado: Creadion de alertas.');
    }

}
