<?php

namespace App\Http\Controllers\Catalog;

use App\Catalog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\CreateCatalogFormRequest;
use App\Http\Requests\Catalog\FetchCatalogsFormRequest;
use App\Http\Requests\Catalog\UpdateCatalogFormRequest;
use App\Http\Resources\CatalogCollection;
use App\Transaction;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function createView()
    {
        return view("dash.partial.catalog._create_catalog_");
    }
    public function catalogsView()
    {
        return view("dash.partial.catalog._view_catalogs_");
    }

    public function catalogView(Catalog $catalog)
    {
//        return $catalog;
        return view("dash.partial.catalog._view_catalog_")->with(["catalog"=>$catalog]);
    }

    public function create(CreateCatalogFormRequest $request)
    {
        $data = $request->validated();
        if (!isset($data["low_stock_qty"])) {
            $data["low_stock_qty"]=0;
        }

        if (!isset($data["qty_per_bulk"])) {
            $data["qty_per_bulk"]=1;
        }
        if (!isset($data["qty_in_stock"])) {
            $data["qty_in_stock"]=0;
        }

        $catalog = Catalog::query()->create($data);
        return response()->json(
            [
                "catalog" => $catalog,
                "message" => "catalogs"
            ], 201);
    }


    public function catalogs(FetchCatalogsFormRequest $request)
    {
//        return Transaction::all();
//        return Catalog::all();
        $data = $request->validated();

        $builder = Catalog::query()->orderBy("id");

        if (isset($data["catalog_type"])) {
            $builder->where("catalog_type", $data["catalog_type"]);
        }

        if (isset($data["search"])) {
            $builder->where(function ($query) use ($data) {
                $query->where("name", "like", "%{$data["search"]}%")
                    ->orWhere("description", "like", "%{$data["search"]}%");
            });

        }

        $catalogs = $builder->paginate($data["limit"]??100 ,  ['*'], 'catalogPage')
//            ->withQueryString();
            ->appends($request->query());

        return $catalogs;
//        return new \App\Http\Resources\Catalog(null);
        return new CatalogCollection($catalogs);
        return response()->json(
            [
                "data" => ["catalog" => new CatalogCollection($catalogs)],
                "message" => "catalogs"
            ], 200);

    }

    public function update(UpdateCatalogFormRequest $request, Catalog $catalog)
    {
        $data = $request->validated();

        foreach (["name", "low_stock_qty", "description","catalog_type"] as $item) {
            if (isset($data[$item])) {
                $catalog->{$item} = $data[$item];
            }
        }

        $catalog->saveOrFail();

        return response()->json(
            [
              "catalog" => $catalog,
                "message" => "catalog Updated"
            ], 200);

    }
//    public function delete(Catalog  $catalog)
//    {
//        return $catalog->delete();
//    }


}
