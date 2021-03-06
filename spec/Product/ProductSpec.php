<?php

namespace spec\Cysha\ProductPriceCalculator\Product;

use Cysha\ProductPriceCalculator\Model\Factory\MoneyFactory;
use Cysha\ProductPriceCalculator\Model\Percentage;
use PhpSpec\ObjectBehavior;
use Cysha\ProductPriceCalculator\Product\Product;

class ProductSpec extends ObjectBehavior
{
    public function let()
    {
        $productName   = 'Product Name';
        $purchasePrice = MoneyFactory::create(1, 'GBP');
        $profitMargin  = Percentage::zeroPercent();

        $this->beConstructedWith($productName, $purchasePrice, $profitMargin);
    }

    public function it_is_initializable()
    {
        $productName   = 'Nintendo 3DS';
        $purchasePrice = MoneyFactory::create(90, 'GBP');
        $profitMargin  = Percentage::zeroPercent();

        $this->create($productName, $purchasePrice, $profitMargin);
    }

    public function it_returns_cost_price()
    {
        $productName   = 'Nintendo 3DS';
        $purchasePrice = MoneyFactory::create(90, 'GBP');
        $profitMargin  = Percentage::zeroPercent();

        $this->beConstructedWith($productName, $purchasePrice, $profitMargin);

        $this->cost()->shouldReturn($purchasePrice);
    }

    public function it_returns_the_profit_margin()
    {
        $productName   = 'Nintendo 3DS';
        $purchasePrice = MoneyFactory::create(90, 'GBP');
        $profitMargin  = Percentage::fromDecimal(0.5);

        $this->beConstructedWith($productName, $purchasePrice, $profitMargin);

        $this->profitMargin()->shouldReturn($profitMargin);
    }

    public function it_returns_base_price()
    {
        $product = Product::create('Linkys Toy', MoneyFactory::create(5, 'GBP'), Percentage::fromDecimal(0.5));
    }
}
