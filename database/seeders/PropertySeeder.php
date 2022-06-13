<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Property;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Faker\Provider\en_US\Address;
use Html;
use Illuminate\Support\Str;
use MetaBox;
use RvMedia;
use SlugHelper;

class PropertySeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('properties');

        Property::truncate();
        Slug::where('reference_type', Property::class)->delete();
        MetaBoxModel::where('reference_type', Property::class)->delete();
        LanguageMeta::where('reference_type', Property::class)->delete();
        $faker = Factory::create('en_US');
        $faker->addProvider(new Address($faker));
        $data = [
            'en_US' => [
                [
                    'name'          => '',
                    'header_layout' => 'layout-1',
                    'coordinates'   => [
                        'lat' => 38.1343013,
                        'lng' => -85.6498512,
                    ],
                ],
            ],
            'vi'    => [
                [
                    'name'          => '',
                    'header_layout' => 'layout-1',
                ],
                [
                    'name'          => '',
                    'header_layout' => 'layout-2',
                ],
                [
                    'name'          => '',
                    'header_layout' => 'layout-3',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
                [
                    'name' => '',
                ],
            ],
        ];

        foreach ($data as $locale => $properties) {
            foreach ($properties as $index => $item) {
                $item['content'] =
                    ($index % 3 == 0 ? Html::tag(
                        'p',
                        '[youtube-video]https://www.youtube.com/watch?v='
                    ) : '') .
                    Html::tag('p', $faker->realText(1000)) .
                    Html::tag(
                        'p',
                        Html::image(RvMedia::getImageUrl('properties/p-' . $faker->numberBetween(1, 7) . '.jpg',
                            'medium'))
                            ->toHtml(),
                        ['class' => 'text-center']
                    ) .
                    Html::tag('p', $faker->realText(500)) .
                    Html::tag(
                        'p',
                        Html::image(RvMedia::getImageUrl('properties/p-' . $faker->numberBetween(8, 15) . '.jpg',
                            'medium'))
                            ->toHtml(),
                        ['class' => 'text-center']
                    ) .
                    Html::tag('p', $faker->realText(1000)) .
                    Html::tag(
                        'p',
                        Html::image(RvMedia::getImageUrl('properties/p-' . $faker->numberBetween(15, 20) . '.jpg',
                            'medium'))
                            ->toHtml(),
                        ['class' => 'text-center']
                    ) .
                    Html::tag('p', $faker->realText(1000));
                $item['author_id'] = 1;
                $item['author_type'] = Account::class;
                $item['is_featured'] = 1;
                $item['is_featured2'] = 1;
                $item['is_featured3'] = 1;
                $item['is_featured4'] = 1;
                $item['is_featured5'] = 1;
                $item['is_featured6'] = 1;
                $item['description'] = $faker->text();
                $item['location'] = $faker->address;
                $item['number_bedroom'] = $faker->numberBetween(50, 500);
                $item['number_bathroom'] = $faker->numberBetween(50, 500);
                $item['number_floor'] = $faker->numberBetween(50, 500);
                $item['number_floor2'] = $faker->numberBetween(50, 500);
                $item['number_floor3'] = $faker->numberBetween(50, 500);
                $item['number_floor4'] = $faker->numberBetween(50, 500);
                $item['number_floor5'] = $faker->text();
                $item['number_floor6'] = $faker->numberBetween(50, 500);

                $item['square'] = $faker->numberBetween(50, 500);
                $item['price'] = $faker->numberBetween(5000, 500000);
                $item['currency_id'] = 1;
                $item['never_expired'] = 1;
                $item['type_id'] = $locale == 'en_US' ? $faker->numberBetween(1, 2) : $faker->numberBetween(3, 4);
                $item['city_id'] = $locale == 'en_US' ? $faker->numberBetween(1, 6) : $faker->numberBetween(6, 12);
                $item['category_id'] = $locale == 'en_US' ? $faker->numberBetween(1, 6) : $faker->numberBetween(6, 12);
                $item['moderation_status'] = ModerationStatusEnum::APPROVED;
                $item['latitude'] = isset($item['coordinates']) ? $item['coordinates']['lat'] : $faker->latitude;
                $item['longitude'] = isset($item['coordinates']) ? $item['coordinates']['lng'] : $faker->longitude;
                $item['author_id'] = Account::inRandomOrder()->value('id');
                $item['author_type'] = Account::class;

                $images = [];
                for ($i = 0; $i < 5; $i++) {
                    $images[] = 'properties/p-' . $faker->numberBetween(1, 20) . '.jpg';
                }
                $item['images'] = json_encode($images);
                $header_layout = isset($item['header_layout']) ? $item['header_layout'] : false;
                unset($item['header_layout']);
                unset($item['coordinates']);
                $property = Property::create($item);
                $property->features()->sync($locale == 'en_US' ? [
                    $faker->numberBetween(1, 5),
                    $faker->numberBetween(5, 12),
                ] : [$faker->numberBetween(13, 18), $faker->numberBetween(18, 24)]);
                $property->facilities()->sync($locale == 'en_US' ? [
                    $faker->numberBetween(1, 12),
                    $faker->numberBetween(5, 12),
                ] : [$faker->numberBetween(13, 18), $faker->numberBetween(18, 24)]);

                if ($header_layout) {
                    MetaBox::saveMetaBoxData($property, 'header_layout', $header_layout);
                }

                MetaBox::saveMetaBoxData($property, 'video_url', $faker->randomElement([
                    'https://www.youtube.com/watch?v=',
                    'https://www.youtube.com/watch?v=',
                ]));

                Slug::create([
                    'reference_type' => Property::class,
                    'reference_id'   => $property->id,
                    'key'            => Str::slug($property->name),
                    'prefix'         => SlugHelper::getPrefix(Property::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Property::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($property, $locale, $originValue);
            }
        }
    }
}
