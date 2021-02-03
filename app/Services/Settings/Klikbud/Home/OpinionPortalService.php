<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\KLIKBUD\OpinionPortal;
use App\Services\Services;
use Exception;
use Illuminate\Support\Facades\Auth;

class OpinionPortalService extends Services
{
    /**
     * @var KlikbudFunctionsHelper
     */
    private KlikbudFunctionsHelper $functions;

    /**
     * MainSliderService constructor.
     * @param KlikbudFunctionsHelper $klikbudFunctionsHelper
     */
    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->functions = $klikbudFunctionsHelper;
    }

    /**
     * @param $title
     * @param $url
     * @return mixed
     */
    public function store($title, $url): mixed
    {
        try {
            $store = new OpinionPortal();

            $data = [
                'title' => $title,
                'url' => $url,
                'user_id' => Auth::id(),
            ];

            $store->fill($data);
            $store->save();

            return $store->id;
        }catch (Exception){
            return false;
        }

    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data): bool
    {
        try {
            OpinionPortal::findOrFail($id)->update($data);
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @return bool
     */
    public function updateImage($id, $image_id): bool
    {
        try {
            OpinionPortal::findOrFail($id)->update(['image_id' => $image_id]);
            return true;
        }catch (Exception){
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
            $opinion = OpinionPortal::find($id);

            if($opinion !== null)
            {
                if($opinion->image_id !== null)
                {
                    $this->functions->deleteImage($opinion->image_id);
                }

                $opinion->delete();

                return true;
            }

            abort(403);

            return false;

        }catch (Exception){

            return false;
        }

    }
}
