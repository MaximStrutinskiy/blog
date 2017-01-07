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
}
