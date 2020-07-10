<?php

namespace Grayloon\Magento\Tests;

use Grayloon\Magento\Models\MagentoCategory;

class MagentoCategoryModelTest extends TestCase
{
    public function test_can_create_magento_category()
    {
        $category = factory(MagentoCategory::class)->create();

        $this->assertNotEmpty($category);
    }

    public function test_magento_category_can_have_parent_category()
    {
        $category = factory(MagentoCategory::class)->create([
            'parent_id' => $parent = factory(MagentoCategory::class)->create(),
        ]);

        $this->assertNotEmpty($category, $parent);
        $this->assertEquals($category->parent()->first()->id, $parent->id);
        $this->assertNotEquals($category->parent()->first()->id, $category->id);
    }

    public function test_can_add_custom_attributes_to_magento_category()
    {
        $category = factory(MagentoCategory::class)->create();

        $attribute = $category->customAttributes()->updateOrCreate([
            'attribute_type' => 'foo',
            'value'          => 'bar',
        ]);

        $this->assertNotEmpty($attribute);
        $this->assertEquals('foo', $attribute->attribute_type);
        $this->assertEquals('bar', $attribute->value);
        $this->assertEquals(MagentoCategory::class, $attribute->attributable_type);
        $this->assertEquals($category->id, $attribute->attributable_id);
    }
}