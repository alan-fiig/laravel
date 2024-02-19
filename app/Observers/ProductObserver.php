<?php
// app/Observers/ProductObserver.php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function creating()
    {
        echo "Creating: Se está creando un nuevo producto.\n";
    }

    public function created(Product $product)
    {
        echo "Created: Se ha creado un nuevo producto con ID {$product->id}.\n";
    }

    public function updating(Product $product)
    {
        echo "Updating: Se está actualizando el producto con ID {$product->id}.\n";
    }

    public function updated(Product $product)
    {
        echo "Updated: Se ha actualizado el producto con ID {$product->id}\n";
    }

    public function deleting(Product $product)
    {
        echo "Deleting: Se está eliminando el producto con ID {$product->id}.\n";
    }

    public function deleted(Product $product)
    {
        echo "Deleted: Se ha eliminado el producto con ID {$product->id}.\n";
    }
}
