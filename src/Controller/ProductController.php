<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function showProductAction(ProductRepository $repo): Response
    {
        $product = $repo->findAll();
        return $this->render('Product/index.html.twig',[
            'product'=> $product
        ]);
    }
   /**
   * @Route("/product/add", name="addProduct")
   */
  public function addProductAction(ManagerRegistry $res, Request $req, ValidatorInterface $valid): Response
  {
    $product = new Product();
    $productForm = $this->createForm(ProductFormType::class, $product);
    $productForm->handleRequest($req);
    $entity = $res->getManager();
    if($productForm->isSubmitted() && $productForm->isValid()) {
      $data = $productForm->getData();
      $product->setProductName($data->getProductName());
      $product->setPrice($data->getPrice());
      $product->setOldPrice($data->getOldPrice());
      $product->setSmallDesc($data->getSmallDesc());
      $product->setDetailDesc($data->getDetailDesc());
      $product->setProDate($data->getProDate());
      $product->setProQty($data->getProQty());
      $product->setCat($data->getCat());
      $product->setImage($data->getImage());

      $err = $valid->validate($product);
      if (count($err) > 0) {
        $string_err = (string)$err;
        return new Response($string_err, 400);
      }
      $entity->persist($product);
      $entity->flush();
      return $this->redirectToRoute("app_product");
    }
    return $this->render('product/add.html.twig', [
      'form' => $productForm->createView()
    ]);
  }
      /**
     * @Route("/edit/{id}", name="editProduct")
     */
    public function editProductAction(ManagerRegistry $res, Request $req, ValidatorInterface $valid, ProductRepository $repo, $id): Response
    {
      $product = $repo->find($id);
      $productForm = $this->createForm(ProductFormType::class, $product);
      $productForm->handleRequest($req);
        $entity = $res->getManager();
        if($productForm->isSubmitted() && $productForm->isValid()) {
          $data = $productForm->getData();
          $product->setProductName($data->getProductName());
          $product->setPrice($data->getPrice());
          $product->setOldPrice($data->getOldPrice());
          $product->setSmallDesc($data->getSmallDesc());
          $product->setDetailDesc($data->getDetailDesc());
          $product->setProDate($data->getProDate());
          $product->setProQty($data->getProQty());
          $product->setCat($data->getCat());
          $product->setImage($data->getImage());
    
          $err = $valid->validate($product);
          if (count($err) > 0) {
            $string_err = (string)$err;
            return new Response($string_err, 400);
          }
          $entity->persist($product);
          $entity->flush();
          return $this->redirectToRoute("car_index");
        }
        return $this->render('product/add.html.twig', [
          'form' => $productForm->createView()
        ]);
    }
}
