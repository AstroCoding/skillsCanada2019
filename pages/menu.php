<script>
  menuList = [
    [
      ["Seafood Chowder", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/manhattan-seafood-chower.jpg"],
      ["Seared Scallops", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/fettuccine-con-capesante.jpg"]
    ],
    [
      ["Calamari", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$18", "./assets/images/menu-images/calamari.jpg"
      ]
    ],
    [
      ["Yellow Fish Tuna Tartar", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$24", "./assets/images/menu-images/yellowfin-tuna-tartar-avocado.jpg"
      ]
    ],
    [
      ["House-Made Lemonade", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$4.25", "./assets/images/menu-images/house-made-lemonade.jpg"
      ]
    ],
    [
      ["Appetizer Name", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/calamari.jpg"
      ]
    ],
    [
      ["Favourite Name", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/calamari.jpg"
      ]
    ],
    [
      ["Fish Name", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/calamari.jpg"
      ]
    ],
    [
      ["Drink Name", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rem qui sequi repellendus, necessitatibus ut libero sit veritatis veniam corporis natus dolor culpa vel delectus voluptate impedit possimus fuga temporibus?", "$14", "./assets/images/menu-images/calamari.jpg"
      ]
    ]
  ];

  function loadMenu(menuNumber) {
    $("#menuTarget").empty();
    for (let i = 0; i < menuList[menuNumber].length; i++) {
      $("#menuTarget").append(`
      <div class="card" style="width: fit-content;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12"><h5>${menuList[menuNumber][i][0]} - ${menuList[menuNumber][i][2]}</h5></div>
            <div class="col-md-8">${menuList[menuNumber][i][1]}</div>
            <div class="col-md-4"><img src="${menuList[menuNumber][i][3]}" alt="Picture of Dish" width="70%"></div>
          </div>
        </div>
      </div>`);
    }
  }
</script>

<div class="row">
  <div class="col-md-12 ml-2 pr-2" style="border-top: 1px solid grey; border-bottom: 0.5px solid grey;">
    <h1><?php switch($menuType){case "dinner": echo("Dinner "); break; case "lunch": echo("Lunch "); break; default: echo("Lunch "); break;} ?>Menu</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12 ml-2 pr-2 pt-2 pb-2" style="border-top: 0.5px solid grey; border-bottom: 1px solid grey;">
    <a href="./?lunch" class="btn btn-secondary">Lunch</a> |
    <a href="./?dinner" class="btn btn-secondary">Dinner</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 ml-1 pr-2" style="border-top: 0.5px solid grey; border-bottom: 1px solid grey;">
    <?php
      if (isset($menuType)) {
        switch($menuType) {
          case "lunch":
            echo "<button onclick='loadMenu(0);' class='btn btn-info mt-1 mb-1'>Appetizer</button>
            <button onclick='loadMenu(1);' class='btn btn-info mt-1 mb-1'>Local Favourites</button>
            <button onclick='loadMenu(2);' class='btn btn-info mt-1 mb-1'>Fish</button>
            <button onclick='loadMenu(3);' class='btn btn-info mt-1 mb-1'>Drinks</button>
            </div>";
            break;

          case "dinner":
            echo "<button onclick='loadMenu(4);' class='btn btn-info mt-1 mb-1'>Appetizer</button>
            <button onclick='loadMenu(5);' class='btn btn-info mt-1 mb-1'>Local Favorites</button>
            <button onclick='loadMenu(6);' class='btn btn-info mt-1 mb-1'>Fish</button>
            <button onclick='loadMenu(7);' class='btn btn-info mt-1 mb-1'>Drinks</button>
            </div>";
            break;

          default:
            echo "<button onclick='loadMenu(0);' class='btn btn-info mt-1 mb-1'>Appetizer</button>
            <button onclick='loadMenu(1);' class='btn btn-info mt-1 mb-1'>Local Favorites</button>
            <button onclick='loadMenu(2);' class='btn btn-info mt-1 mb-1'>Fish</button>
            <button onclick='loadMenu(3);' class='btn btn-info mt-1 mb-1'>Drinks</button>
            </div>";
            break;
        }
      } else {
        echo "<button onclick='loadMenu(0);' class='btn btn-info mt-1 mb-1'>Appetizer</button>
        <button onclick='loadMenu(1);' class='btn btn-info mt-1 mb-1'>Local Favorites</button>
        <button onclick='loadMenu(2);' class='btn btn-info mt-1 mb-1'>Fish</button>
        <button onclick='loadMenu(3);' class='btn btn-info mt-1 mb-1'>Drinks</button>
        </div>";
      }
    ?>
    <div class="col-md-12 mt-2 pr-4 pl-4" id="menuTarget">

    </div>
  </div>
</div>

<hr>

<script>
  <?php
    if (isset($menuType)) {
      switch($menuType) {
        case "lunch":
        echo "loadMenu(0);";
        break;

      case "dinner":
        echo "loadMenu(4);";
        break;

      default:
        echo "loadMenu(0);";
        break;
      }
    } else {
      echo "loadMenu(0);";
    }
  ?>
</script>