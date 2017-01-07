<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function showPostAction()
    {
        $em = $this->getDoctrine();
        $postRepository = $em->getRepository("BlogBundle:Post");
        $allPost = $postRepository->findAll();
        $allPost = array_reverse($allPost);

        return $this->render(
            'BlogBundle:Page/_blog:_blog_content.html.twig',
            [
                'posts' => $allPost,
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
     */
    public function showInternalCategoryAction($id)
    {
        $em = $this->getDoctrine();

        $postRepository = $em->getRepository("BlogBundle:Post");
        $categoryRepository = $em->getRepository("BlogBundle:Category");

        $findPostsByIdCategory = array("category" => $id,);
        $findCategoryName = array("id" => $id,);

        $allPost = $postRepository->findBy($findPostsByIdCategory);
        $oneCategory = $categoryRepository->findOneBy($findCategoryName);

        $allPost = array_reverse($allPost);

        return $this->render(
            "BlogBundle:Page/_blog:_category_internal.html.twig",
            [
                'category' => $oneCategory,
                'posts' => $allPost,
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
     */
    public function showInternalTagAction($id)
    {
        $em = $this->getDoctrine();

        $postRepository = $em->getRepository("BlogBundle:Post");
        $tagRepository = $em->getRepository("BlogBundle:Tag");

        $findPostsByIdTag = array("tag" => $id);
        $findTagName = array("id" => $id);

        $allPost = $postRepository->findBy($findPostsByIdTag);
        $oneTag = $tagRepository->findOneBy($findTagName);

        $allPost = array_reverse($allPost);

        return $this->render(
            "BlogBundle:Page/_blog:_tag_internal.html.twig",
            [
                'tag' => $oneTag,
                'posts' => $allPost,
            ]
        );
    }
}
