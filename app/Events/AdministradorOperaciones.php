<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\OperacionProducto;

class AdministradorOperaciones
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $modelo;
    public $usuario_id;
    public $operacion;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($modelo, $usuario_id, $operacion, $TABLE)
    {
        $this->modelo = $modelo;
        $this->usuario_id = $usuario_id;
        $this->operacion = $this->operacion($operacion);

        switch ($TABLE) {
            case "PRODUCTO":
                $this->crearOperacionProducto();
                break;
        }
    }

    public function operacion($operacion)
    {
        switch ($operacion) {
            case "ALTA":
                return 1;
            case "BAJA":
                return 2;
        }
    }

    public function crearOperacionProducto()
    {
        $oproducto = new OperacionProducto();
        $oproducto->operacion = $this->operacion;
        $oproducto->producto_id = $this->modelo->id;
        $oproducto->usuario_id = $this->usuario_id;
        $oproducto->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
