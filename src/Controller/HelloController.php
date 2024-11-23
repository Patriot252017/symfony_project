<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    #[Route('/Hello', name: 'app_hello')]
    public function number(Request $request): Response
    {
        $number = $request->get('number');

        if (is_numeric($number)) {
            $result = $this->calculate($number);
            return new Response(
                '<html><body>Сила тяжести (F) = ' . $result . ' Н</body></html>'
            );
        } else {
            return new Response(
                '<html><body>
                    <form method="get">
                        <input type="text" name="number" placeholder="Введите Массу объекта (кг)">
                        <button type="submit">Вычислить</button>
                    </form>
                </body></html>'
            );
        }
    }

    private function calculate($number)
    {
        return $number / 10;
    }
}
