<?php

class Dwarf extends Race {
    public function getStats(): Array {
        return [BASE_HP * 1.04, BASE_STR, BASE_INTL * 1.02, BASE_AGI, BASE_PDEF, BASE_MDEF];
    }
}
