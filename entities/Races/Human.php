<?php

class Human extends Race {
    public function getStats(): Array {
        return [BASE_HP, BASE_STR, BASE_INTL * 1.02, BASE_AGI * 1.05, BASE_PDEF, BASE_MDEF];
    }
}
