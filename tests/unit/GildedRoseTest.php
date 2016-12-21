<?php

use App\GildedRose;

use App\Item;


class GildedRoseTest extends \PHPUnit_Framework_TestCase
{


    /** @test */

    public function it_updates_normal_items_before_sell_date()
    {

        $item = GildedRose::of('normal', 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 9);
        $this->assertEquals($item->sellIn, 4);
    }

     /** @test */

    public function it_updates_normal_items_on_sell_date()
    {

        $item = GildedRose::of('normal', 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, -1);
    }


             /** @test */

    public function it_updates_normal_items_after_sell_date()
    {

        $item = GildedRose::of('normal', 10, -5);
        $item->tick();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, -6);
    }


         /** @test */

    public function it_updates_normal_items_with_a_quality_of_0()
    {

        $item = GildedRose::of('normal', 0, 5);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, 4);
    }


         /** @test */

    public function it_updates_bride_items_before_sell_date()
    {

        $item = GildedRose::of('Aged Brie', 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 4);
    }


          /** @test */

    public function it_updates_bride_items_before_sell_date_with_maximum_quality()
    {

        $item = GildedRose::of('Aged Brie', 50, 5);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }


          /** @test */

    public function it_updates_bride_items_on_sell_date()
    {

        $item = GildedRose::of('Aged Brie', 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -1);
    }


              /** @test */

    public function it_updates_bride_items_on_sell_date_near_maximum_quality()
    {

        $item = GildedRose::of('Aged Brie', 50, 0);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -1);
    }


              /** @test */

    public function it_updates_bride_items_on_sell_date_with_maximum_quality()
    {

        $item = GildedRose::of('Aged Brie', 49, 0);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -1);
    }


              /** @test */

    public function it_updates_bride_items_after_sell_date()
    {

        $item = GildedRose::of('Aged Brie', 10, -10);
        $item->tick();
        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -11);
    }

                  /** @test */

    public function it_updates_bride_items_after_sell_date_with_maximum_quality()
    {

        $item = GildedRose::of('Aged Brie', 50, -10);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -11);
    }


                /** @test */

    public function it_updates_sulfuras_items_before_sell_day()
    {

        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 5);
    }


                /** @test */

    public function it_updates_sulfuras_items_on_sell_day()
    {

        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 0);
    }


                    /** @test */

    public function it_updates_sulfuras_items_after_sell_day()
    {

        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, -1);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, -1);
    }



                    /** @test */

    public function it_updates_backstage_pass_items_long_before_sell_day()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $item->tick();
        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 10);
    }


                    /** @test */

    public function it_updates_backstage_pass_items_close_to_sell_day_at_maximum_quality()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 9);
    }


                        /** @test */

    public function it_updates_backstage_pass_items_very_close_to_sell_day()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sellIn, 4);
    }

                        /** @test */

    public function it_updates_backstage_pass_items_very_close_to_sell_day_at_maximum_quality()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }

                            /** @test */

    public function it_updates_backstage_pass_items_with_one_day_left_to_sell()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 1);
        $item->tick();
        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sellIn, 0);
    }

                                /** @test */

    public function it_updates_backstage_pass_items_with_one_day_left_to_sell_at_maximum_quality()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 1);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 0);
    }

                                    /** @test */

    public function it_updates_backstage_pass_items_on_sell_day()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -1);
    }


                                        /** @test */

    public function it_updates_backstage_pass_items_after_sell_day()
    {

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, -1);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -2);
    }



                                        /** @test */

    public function it_updates_conjured_items_before_sell_day()
    {

        $item = GildedRose::of('Conjured Mana Cake', 10, 10);
        $item->tick();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, 9);
    }


                                        /** @test */

    public function it_updates_conjured_items_at_zero_quality()
    {

        $item = GildedRose::of('Conjured Mana Cake', 0, 10);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, 9);
    }


                                        /** @test */

    public function it_updates_conjured_items_on_sell_date()
    {

        $item = GildedRose::of('Conjured Mana Cake', 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 6);
        $this->assertEquals($item->sellIn, -1);
    }



                                        /** @test */

    public function it_updates_conjured_items_on_sell_date_at_zero_quality()
    {

        $item = GildedRose::of('Conjured Mana Cake', 0, 0);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -1);
    }



                                        /** @test */

    public function it_updates_conjured_items_after_sell_date()
    {

        $item = GildedRose::of('Conjured Mana Cake', 10, -10);
        $item->tick();
        $this->assertEquals($item->quality, 6);
        $this->assertEquals($item->sellIn, -11);
    }


                                            /** @test */

    public function it_updates_conjured_items_after_sell_date_at_zero_quality()
    {

        $item = GildedRose::of('Conjured Mana Cake', 0, -10);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -11);
    }





}