<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * blog page
     */
    public function homeAction()
    {
        return $this->render('BlogBundle:Page/_blog:blog.html.twig');
    }

    /**
     * =======POST========
     */

    /**
     * show all posts
     */
    public function showPostAction(Request $request)
    {
        $postRepository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $query = $postRepository->findAllPostQuery();

        //breadcrumbs
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Blog");

        //pagination
        $pagination = $this->get('knp_paginator');
        $request = $this->get('request_stack')->getMasterRequest();
        $result = $pagination->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render(
            'BlogBundle:Page/_blog:_blog_content.html.twig',
            [
                'posts' => $result,
            ]
        );
    }

    /**
     * show internal post
     */
    public function showInternalPostAction($id)
    {
        $em = $this->getDoctrine();
        $postRepository = $em->getRepository("BlogBundle:Post");
        $post = $postRepository->find($id);

        //breadcrumbs
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Blog", $this->get("router")->generate("blog"));
        $breadcrumbs->addItem($post->getShortTitle());

        return $this->render(
            "BlogBundle:Page/_blog:post.html.twig",
            [
                'post' => $post,
            ]
        );
    }

    /**
     * =====CATEGORY======
     */

    /**
     * show all category's
     */
    public function showCategoryAction()
    {
        $em = $this->getDoctrine();
        $categoryRepository = $em->getRepository("BlogBundle:Category");
        $allCategory = $categoryRepository->findAll();

        return $this->render(
            'BlogBundle:Page/_blog:_category_content.html.twig',
            [
                'category' => $allCategory,
            ]
        );
    }

    /**
     * show all post with category $id
     * @param int $id
     */
    public function showInternalCategoryAction($id, Request $request)
    {
        $em = $this->getDoctrine();
        $categoryRepository = $em->getRepository("BlogBundle:Category");
        $findCategoryName = array("id" => $id,);
        $oneCategory = $categoryRepository->findOneBy($findCategoryName);

        $postRepository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $query = $postRepository->findAllPostByCategoryQuery($id);

        //breadcrumbs
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Blog", $this->get("router")->generate("blog"));
        $breadcrumbs->addItem($oneCategory->getName());

        //paginator
        $paginator = $this->get('knp_paginator');
        $request = $this->get('request_stack')->getMasterRequest();
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render(
            "BlogBundle:Page/_blog:_category_internal.html.twig",
            [
                'category' => $oneCategory,
                'posts' => $result,
            ]
        );
    }

    /**
     * =======TAG========
     */

    /**
     * show all tags
     */
    public function showTagAction()
    {
        $em = $this->getDoctrine();
        $tagRepository = $em->getRepository("BlogBundle:Tag");
        $allTag = $tagRepository->findAll();

        return $this->render(
            'BlogBundle:Page/_blog:_tag_content.html.twig',
            [
                'tag' => $allTag,
            ]
        );
    }

    /**
     * show all post with tag $id
     * don't work !!!!!!!!
     * @param int $id
     */
    public function showInternalTagAction($id)
    {
        $em = $this->getDoctrine();

        $tagRepository = $em->getRepository("BlogBundle:Tag");
        $findTagName = array("id" => $id);
        $tagName = $tagRepository->findOneBy($findTagName);
        $allTags = $tagRepository->findAll();
        $postRepository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $query = $postRepository->findAllPostByTagQuery($tagName);

        //breadcrumbs
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Blog", $this->get("router")->generate("blog"));
        $breadcrumbs->addItem($tagName->getName());

        //pagination
        $paginator = $this->get('knp_paginator');
        $request = $this->get('request_stack')->getMasterRequest();
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render(
            "BlogBundle:Page/_blog:_tag_internal.html.twig",
            [
                'setTags' => $allTags,
                'tag' => $tagName,
                'posts' => $result,
            ]
        );
    }
}
