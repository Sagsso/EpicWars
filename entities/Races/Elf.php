<?php

// namespace entities\Races;

class Elf extends Race {
    public function getStats(): Array {
        return [BASE_HP, BASE_STR, BASE_INTL * 1.1, BASE_AGI * 1.05, BASE_PDEF * 0.95, BASE_MDEF];
    }
}
