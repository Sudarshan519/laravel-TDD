<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use OpenApi\Annotations as OA;
 
/**
 * Class ArticleControllerController
 * @package  App\Http\Controllers
 */
class ArticleController extends Controller
{

    /**
     * @OA\Get(
     *  path="/api/articles",
     *  operationId="indexArticles",
     *  tags={"Articles"},
     *  summary="Get list of Articles",
     *  description="Returns list of Articles",
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Article"),
     *  ),
     * )
     *
     * Display a listing of Product.
     * @return JsonResponse
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

        /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     summary="Get a list of articles",
     *     description="Retrieve a list of articles from the database.",
     *     tags={"Articles"},
     *     @OA\Response(
     *         response=200,
     *         description="List of articles",
     *             @OA\JsonContent(ref="#/components/schemas/Article")
     *     ),
     * )
     */
    public function show(Article $article)
    {
        return response()->json($article);
    }


    /**
     * @OA\Post(
     *  operationId="storeArticle",
     *  summary="Insert a new Article",
     *  description="Insert a new Article",
     *  tags={"Articles"},
     *  path="/articles",
     *  @OA\RequestBody(
     *    description="Article to create",
     *    required=true,
     *    @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *      @OA\Property(
     *      title="data",
     *      property="data",
     *      type="object",
     *      ref="#/components/schemas/Article")
     *     )
     *    )
     *  ),
     *  @OA\Response(response="201",description="Article created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Article"
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     * )
     *
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        // return $request->all();
        return response()->json($article, 201);
    }
     /**
     * @OA\Get(
     *   path="/articles/{article_id}",
     *   summary="Show a Article from his Id",
     *   description="Show a Article from his Id",
     *   operationId="showArticle",
     *   tags={"Articles"},
     *   @OA\Parameter(ref="#/components/parameters/Article--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Article"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Article not found"),
     * )
     *
     * @param Article $Article
     * @return JsonResponse
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article);
    }

    /**
     * @OA\Delete(
     *  path="/articles/{article_id}",
     *  summary="Delete a Article",
     *  description="Delete a Article",
     *  operationId="destroyArticle",
     *  tags={"Articles"},
     *  @OA\Parameter(ref="#/components/parameters/Article--id"),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Article not found"),
     * )
     *
     * @param Article $Article
     * @return Response|JsonResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}

