<?php

namespace App\Http\Controllers;

class ArrayManipulationController extends Controller
{
    protected array $array = [];
    protected string $valueSeparatedByCommas = '';

    public function __invoke()
    {
        $this->setArray([1, 3, 5, 12, 9, 12, 14]);
        $this->printArray(2);
        $this->transformArrayToStringSeparatedByCommas();
        $this->createNewArrayAndDeleteOld();
        $this->checkIfTheValueExists(14);
        $this->deletePreviousSmallerValues();
        $this->deleteLastPosition();
        $this->getLength();
        $this->invertArrayPositions();
    }

    private function setArray(array $values = []): void
    {
        $this->array = $values;
    }

    private function printArray(?int $index = 0): void
    {
        if ((count($this->array) - 1) < $index || $index < 0) {
            echo 'O index selecionado não existe!';

            return;
        }

        echo $this->array[$index];
    }

    private function transformArrayToStringSeparatedByCommas(): void
    {
        $this->valueSeparatedByCommas = implode(',', $this->array);
    }

    private function createNewArrayAndDeleteOld(): void
    {
        unset($this->array);

        $newArray = explode(',', $this->valueSeparatedByCommas);

        $this->array = $newArray;
    }

    private function checkIfTheValueExists(int|string $value): bool
    {
        return in_array($value, $this->array);
    }

    private function deletePreviousSmallerValues(): void
    {
        foreach ($this->array as $key => $value) {
            if ($key > 0 && $this->array[$key - 1] > $value) {
                unset($this->array[$key - 1]);
            }
        }

        $this->array = array_values($this->array);
    }

    private function deleteLastPosition(): void
    {
        $count = count($this->array);

        unset($this->array[$count - 1]);
    }

    private function getLength(): int
    {
        return count($this->array);
    }

    private function invertArrayPositions(): void
    {
        $this->array = array_reverse($this->array);
    }
}
