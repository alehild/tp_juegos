<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; // Importar el modelo Game

class LoginController extends Controller
{
    // Método para mostrar el formulario de registro
    public function register()
    {
        return view('auth.login');
    }

    // Método para validar el registro (debería añadirse si se va a procesar el formulario)
    public function validarRegistro(Request $request)
    {
        // Lógica para validar el registro
    }
}