<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // Static pages
        Page::insert([
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'description' => 'This is the About Us page description. Here you can write about your company history, mission, and values.',
                'image' => 'about-us.jpg',
                'meta_title' => 'About Us - Company Name',
                'meta_description' => 'Learn more about our company, mission, and values.',
                'meta_keywords' => 'about us, company, mission',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'description' => 'Get in touch with us for any questions, support, or business inquiries. You can contact us via email, phone, or by visiting our office.',
                'image' => 'contact-us.jpg',
                'meta_title' => 'Contact Us - Company Name',
                'meta_description' => 'Contact Company Name for support, inquiries, or partnership opportunities.',
                'meta_keywords' => 'contact us, support, help',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'description' => 'This page describes how we collect, use, and protect your personal information.',
                'image' => null,
                'meta_title' => 'Privacy Policy - Company Name',
                'meta_description' => 'Read our privacy policy and data protection practices.',
                'meta_keywords' => 'privacy policy, data protection, privacy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms-conditions',
                'description' => 'These terms and conditions outline the rules and regulations for using our website.',
                'image' => null,
                'meta_title' => 'Terms and Conditions - Company Name',
                'meta_description' => 'Understand the terms and conditions before using our services.',
                'meta_keywords' => 'terms, conditions, rules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Categories',
                'slug' => 'categories',
                'description' => 'These terms and conditions outline the rules and regulations for using our website.',
                'image' => null,
                'meta_title' => 'Categories - Company Name',
                'meta_description' => 'Understand the categories before using our services.',
                'meta_keywords' => 'categories, category, rules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Faq',
                'slug' => 'faq',
                'description' => 'These terms and conditions outline the rules and regulations for using our website.',
                'image' => null,
                'meta_title' => 'Faq - Company Name',
                'meta_description' => 'Understand the faq before using our services.',
                'meta_keywords' => 'faq, faq, rules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shop',
                'slug' => 'shop',
                'description' => 'These terms and conditions outline the rules and regulations for using our website.',
                'image' => null,
                'meta_title' => 'Shop - Company Name',
                'meta_description' => 'Understand the shop before using our services.',
                'meta_keywords' => 'shop, shopping, rules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Product Details',
                'slug' => 'product-details',
                'description' => 'These terms and conditions outline the rules and regulations for using our website.',
                'image' => null,
                'meta_title' => 'Product Details - Company Name',
                'meta_description' => 'Understand the product details before using our services.',
                'meta_keywords' => 'shop, shopping, rules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Optional: generate 5 random pages using factory
        Page::factory()->count(5)->create();
    }
}
