<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteCompletedNotification; // Crearemos esto en el siguiente paso

class QuoteController extends Controller
{
    public function complete(Quote $quote)
    {
        // 1. Cambia el estado de la cotización
        $quote->status = 'completed';
        $quote->save();

        // 2. Envía el correo de notificación al cliente
        Mail::to($quote->user->email)->send(new QuoteCompletedNotification($quote));

        // 3. Redirige de vuelta con un mensaje de éxito
        return redirect()->route('admin.dashboard')->with('success', 'La reparación ha sido marcada como completada y se ha notificado al cliente.');
    }

    public function destroy(Quote $quote)
    { 
        if ($quote->status === 'completed') {
            $quote->delete();
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'La cotización ha sido eliminada permanentemente.');
    }

}