<?php

namespace App\Services\Clients;

use App\Models\Clients\ClientNotes;
use Illuminate\Support\Facades\Auth;

class ClientNoteService
{
    /**
     * @param $client_id
     * @return mixed
     */
    public function showNotes($client_id): mixed
    {
      return ClientNotes::where('client_id', $client_id)->orderBy('id', 'desc')->paginate(6);
    }

    /**
     * @param $client_id
     * @param $note
     * @return bool
     */
    public function store($client_id, $note): bool
    {
        try {
            $data = [
                'user_id' => Auth::id(),
                'client_id' => $client_id,
                'note' => $note
            ];

            $store = new ClientNotes();
            $store->fill($data)->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            ClientNotes::findOrFail($id)->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
