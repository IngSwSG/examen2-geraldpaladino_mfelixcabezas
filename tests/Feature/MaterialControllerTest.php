<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Material;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function dadoUnMaterialQueNoExiste_insertarMaterialfuncionaCorrectamente()
    {
        // Crear una categoría para asociar el material
        $categoria = Categoria::factory()->create();

        // Datos del material a insertar
        $data = [
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacen 1',
            'idCategoria' => $categoria->id,
        ];

        // Ejecutar la petición POST
        $response = $this->post('/materiales', $data);

        // Verificar redirección (por el redirect en el controlador)
        $response->assertStatus(302);

        // Verificar que el material fue insertado en la base de datos
        $this->assertDatabaseHas('materials', [
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacen 1',
            'idCategoria' => $categoria->id,
        ]);
    }
}