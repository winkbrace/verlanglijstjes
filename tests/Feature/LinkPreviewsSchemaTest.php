<?php declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * Guards the ->change() migration 2023_11_16_172456_increase_link_preview_text_fields,
 * because Laravel 11 drops any column modifiers that are not repeated when changing a column.
 */
class LinkPreviewsSchemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_link_preview_text_fields_are_text_with_the_right_nullability(): void
    {
        $columns = collect(Schema::getColumns('link_previews'))->keyBy('name');

        $this->assertTextColumn($columns['description']);
        $this->assertTrue($columns['description']['nullable']);

        $this->assertTextColumn($columns['link']);
        $this->assertFalse($columns['link']['nullable']);

        $this->assertTextColumn($columns['image']);
        $this->assertTrue($columns['image']['nullable']);

        $this->assertTrue($columns['title']['nullable']);
    }

    /**
     * On SQLite, Doctrine DBAL (Laravel 10) creates CLOB columns, while Laravel 11+ natively creates TEXT columns.
     */
    private function assertTextColumn(array $column): void
    {
        $this->assertContains($column['type_name'], ['text', 'clob'], "Column {$column['name']} is not a text column");
    }
}
