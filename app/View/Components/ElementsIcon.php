<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class ElementsIcon extends Component
{
    public string $name;
    public ?string $class;

    /** 
     * string $name Wajib diisi saat komponen dipanggil. Misalnya: <x-ElementsIcon name="check" /> maka name = "check"
     *  ?string $class = null Artinya ini opsional, bisa string atau null.
     */
    public function __construct(string $name, ?string $class = null)
    {
        $this->name = $name;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        // merujuk pada tempat file .svg nya
        $path = resource_path("svg/{$this->name}.svg");

        // Artinya jika file yang di panggil tidak ada maka akan menampilkan returnnya
        if (!File::exists($path)) {
            // Kembalikan Closure agar tidak diproses sebagai Blade
            return fn() => "<!-- SVG file tidak ada: {$this->name} -->";
        }

        $svg = File::get($path);

        //1. Hapus atribut bawaan dari file svg karena itu mengunci style sehingga jika tidak dihapus style tidak akan bisa berubah
        //contohnya : width, weight, fill, stroke, class apa pun
        $svg = preg_replace('/\s+(width|height|class)="[^"]*"/i', '', $svg);
        //2. memastikan <svg …> punya fill="currentColor"
        $svg = preg_replace(
            '/<svg\b([^>]*)>/i',
            '<svg$1 fill="currentColor" class="' . ($this->class ?? '') . '">',
            $svg,
            1
        );

        //3. Ganti semua fill/stroke hardcoded ke currentColor
        $svg = preg_replace('/fill="[^"]*"/i', 'fill="currentColor"', $svg);
        $svg = preg_replace('/stroke="[^"]*"/i', 'stroke="currentColor"', $svg);
        return fn() => $svg;
    }
}

/**
 * Brand-Brands : 
 * behance
 * instagram
 * linkedin
 * dribble-brands
 * whatsapp
 * SVG SVG yang ada
 * arrow-right
 * burder-menu
 * delete
 * envelope-solid
 * error
 * search
 */
