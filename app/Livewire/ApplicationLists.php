<?php

namespace App\Livewire;

use App\Models\Scheme;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\Attributes\On;

class ApplicationLists extends Component
{
    public bool $schemeData = false;
    public $schemeId, $schemeName = null;
    public bool $dropDown = true;
    public function mount($dropDown = true)
    {
        $this->dropDown = $dropDown ?? true;
        if (!$this->dropDown) {
            $select_lgd = session('lgd_session');
            if (!empty($select_lgd['scheme_id'])) {
                $rawSchemeId = is_array($select_lgd['scheme_id']) ? $select_lgd['scheme_id'][0] : $select_lgd['scheme_id'];
                try {
                    $this->schemeId = Crypt::decryptString($rawSchemeId);
                    $scheme = Scheme::find($this->schemeId);
                    if ($scheme) {
                        $this->schemeName = $scheme->name;
                        $this->schemeData = true;
                    }
                } catch (\Exception $e) {
                    // Fallback to showing dropdown if decryption fails
                    $this->schemeData = false;
                }
            }
        }
    }
    #[On('selectedScheme')]
    public function updateschemeData($schemeData)
    {
        if ($schemeData) {
            $this->schemeData = true;
            $this->schemeId = $schemeData['scheme_id'];
            $this->schemeName = $schemeData['scheme_name'];
        } else {
            $this->schemeData = false;
        }
    }
    public function render()
    {
        return view('livewire.application-lists');
    }
}
