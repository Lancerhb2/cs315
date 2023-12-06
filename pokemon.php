<?php
    class Pokemon {
        private $id;
        private $name;
        private $type1;
        private $type2;
        private $generation;
        private $price;
        private $memberPrice;

        /*
        public function __construct($id, $name, $type1, $type2, $generation, $price, $memberPrice) {
            $this->id = $id;
            $this->name = $name;
            $this->type1 = $type1;
            $this->type2 = $type2;
            $this->generation = $generation;
            $this->price = $price;
            $this->memberPrice = $memberPrice;
        }
        */
        public function __construct($sqlRow) {
            $this->id = $sqlRow['id'];
            $this->name = $sqlRow['name'];
            $this->type1 = $sqlRow['type1'];
            $this->type2 = $sqlRow['type2'];
            $this->generation = $sqlRow['generation'];
            $this->price = $sqlRow['price'];
            $this->memberPrice = $sqlRow['member_price'];
        }

        public function getCard() : string {
            $type1Lower = strtolower($this->type1);
            $fileName = str_replace(' ', '_', $this->name);
            $output = <<<Pokemon
            <div class="pokemon">
                <div class="image">
                    <img srcset="resources/gen{$this->generation}/{$fileName}Small.png 250w, resources/gen{$this->generation}/{$fileName}.png 475w"
                        sizes="(max-width: 600px) 250px, 475px"
                        src="resources/gen9/{$this->name}.png"
                        alt ="A picture of {$this->name}">
                </div>
                <div class="description">
                    <p>{$this->generation}, {$this->price}, {$this->memberPrice}</p>
                    <p class="number">#{$this->id}</p>
                    <p class="name">{$this->name}</p>

            
                    <p>
                        <span class="{$type1Lower}">$this->type1</span>
            Pokemon;
            if (strlen($this->type2) > 0) {
                $type2Lower = strtolower($this->type2);
                $output .= <<<TwoTypes
                 & 
                                <span class="{$type2Lower}">$this->type2</span>
                            </p>
                        </div>
                </div>
                
                TwoTypes;
            } else {
                $output .= <<<OneType
                        </p>
                    </div>
                </div>
                OneType;
            }
            return $output;
        }
    }
?>