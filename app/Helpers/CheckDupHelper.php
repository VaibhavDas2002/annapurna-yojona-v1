<?php

namespace App\Helpers;

use App\Models\BeneficiaryAadhaar;

use App\Models\BeneficiaryBankDetail;
use App\Models\BeneficiaryPersonalDetail;

class CheckDupHelper
{
    public static function checkDuplicate(string $type, string $value, string $incompleteType, string $schemeId)
    {
        if (!$value) {
            return true;
        }

        if ($type === 'aadhaar') {
            $aadhaar = md5($value);

            $existsInCommonList = BeneficiaryAadhaar::where('encoded_aadhaar', $aadhaar)
                ->whereRelation('personal', 'scheme_id', $schemeId)
                ->whereRelation('personal', 'is_final', 1)
                ->whereRelation('personal', 'next_level_role_id', '!=', -100)
                ->exists();

            if ($existsInCommonList) {
                return "Duplicate found for Aadhaar: {$value}";
            }

            return true;
        }

        if ($type === 'mobile') {

            $existsInCommonList = BeneficiaryPersonalDetail::where('other_details->mobile_no', $value)
                ->where('scheme_id', $schemeId)
                ->where('is_final', 1)
                ->where('next_level_role_id', '!=', -100)
                ->exists();

            // dd($existsInCommonList);
            if ($existsInCommonList) {
                return "Duplicate found for Mobile: {$value}";
            }

            return true;
        }

        if ($type === 'bank') {

            $existsInCommonList = BeneficiaryBankDetail::where('bankaccountnumber', $value)
                ->whereRelation('personal', 'scheme_id', $schemeId)
                ->whereRelation('personal', 'is_final', 1)
                ->whereRelation('personal', 'next_level_role_id', '!=', -100)
                ->exists();

            if ($existsInCommonList) {
                return "Duplicate found for Bank Account: {$value}";
            }

            return true;
        }

        return "Invalid check type!";
    }

    public static function checkBankMobileDuplicate(string $type, string $value, $schemeId)
    {
        $errors = [];

        if ($type === 'mobile') {

            $existsMobile = BeneficiaryPersonalDetail::where('other_details->mobile_no', $value)
                ->where('scheme_id', $schemeId)
                ->where('is_final', 1)
                ->where('next_level_role_id', '!=', -100)
                ->exists();

            if ($existsMobile) {
                $errors[] = "Duplicate found for Mobile: {$value}";
            }
        }

        if ($type === 'bank') {

            $existsBank = BeneficiaryBankDetail::where('bankaccountnumber', $value)
                ->whereHas('personal', function ($q) use ($schemeId) {
                    $q->where('scheme_id', $schemeId)
                        ->where('is_final', 1)
                        ->where('next_level_role_id', '!=', -100);
                })
                ->exists();

            if ($existsBank) {
                $errors[] = "Duplicate found for Bank Account: {$value}";
            }
        }

        return !empty($errors) ? implode(' | ', $errors) : true;
    }
}
