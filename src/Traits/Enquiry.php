<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait Enquiry
{
    public function nameEnquiry(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'NAME_ENQUIRY',
                $reference,
                $data
            ),
            'reference'=>$reference,
            'param'=>$data
        ];
    }

}
