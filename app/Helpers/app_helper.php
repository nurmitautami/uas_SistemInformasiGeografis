<?php

function uploaded($fileName='',$dir='',$defFile='')
{
    if($fileName!='' && $fileName!=NULL && file_exists(FCPATH.'uploads/'.$dir.'/'.$fileName))
    {
        return base_url('uploads/' . $dir . '/' . $fileName);
    }
    else {
        if($defFile=='')
        {
            return base_url('assets/images/default.png');
        }
        else {
            return base_url('assets/images/'.$defFile);
        }
    }
}

function statusPengguna($status)
{
    if($status=='A')
    {
        return '<i class="bi bi-check-circle text-success"></i> Aktif';
    }
    else if($status=='N')
    {
        return '<i class="bi bi-x-circle text-warning"></i> Tidak Aktif';

    }
    else {
        return '<i class="bi bi-slash-circle text-danger"></i> Blokir';
    }
}