<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Dto\PostDto;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostInterface
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Post $model)
    {
        $this->setModel($model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostDto $data)
    {
        $dataArray = $data->toArray();

        $metaDetails = [
            'focus_keyword' => $dataArray['focus_keyword'],
            'meta_title' => $dataArray['meta_title'],
            'meta_description' => $dataArray['meta_description'],
            'og_title' => $dataArray['meta_title'],
            'og_description' => $dataArray['meta_description'],
            'twitter_title' => $dataArray['meta_title'],
            'twitter_description' => $dataArray['meta_description'],
        ];

        $image = $dataArray['image'];
        unset($dataArray['image']);

        $dataResult = $this->add($this->_model, $dataArray);

        $dataResult->meta_detail()->create($metaDetails);

        $schemas = [];

        $schemas[] = [
            'type' => 'BlogPosting',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $dataArray['title'] ?? $dataArray['meta_title'],
                'description' => $dataArray['meta_description'],
                'image' => $image ? url($this->_imgPath . '/' . $image->hashName()) : null,
                'author' => [
                    '@type' => 'Person',
                    'name' => auth()->user()->full_name ?? 'Admin'
                ],
                'datePublished' => now()->toDateString(),
                'dateModified' => now()->toDateString(),
            ])
        ];

        $schemas[] = [
            'type' => 'Article',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => $dataArray['title'],
                'description' => $dataArray['meta_description'],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                    'logo' => ['@type' => 'ImageObject', 'url' => config('app.logo')]
                ],
            ])
        ];

        $schemas[] = [
            'type' => 'FAQPage',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => 'What is ' . $dataArray['title'] . '?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $dataArray['meta_description']
                        ]
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'How does ' . $dataArray['title'] . ' work?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'This guide explains in detail.'
                        ]
                    ]
                ]
            ])
        ];

        $schemas[] = [
            'type' => 'AggregateRating',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'AggregateRating',
                'itemReviewed' => $dataArray['title'],
                'ratingValue' => '4.9',
                'bestRating' => '5',
                'ratingCount' => rand(120, 950)
            ])
        ];

        $schemas[] = [
            'type' => 'WebPage',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => $dataArray['title'],
                'description' => $dataArray['meta_description'],
                'url' => route('post.detail', ['slug' => $dataResult->slug])
            ])
        ];

        $schemas[] = [
            'type' => 'Organization',
            'data' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => config('app.name'),
                'url' => route('welcome'),
                'logo' => config('app.logo')
            ])
        ];

        foreach ($schemas as $schema) {
            $dataResult->schema()->create($schema);
        }

        if ($image != null) {
            $imageUploaded = $this->uploadFile($image, $this->_imgPath);
            $dataResult->file()->create($imageUploaded);
        }

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, PostDto $data)
    {
        $result = $this->checkRecord($id);

        $dataArray = $data->toArray();
        return $result->update($dataArray);
    }
}
