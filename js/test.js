let BtnMoreDetailCbs = document.getElementById("btn-show-more-detail-book-crud");
    let boxDetailCbs = document.querySelectorAll(".container-complete-detail-info-book");

    for (const BtnMoreDetailCb of BtnMoreDetailCbs) {
      BtnMoreDetailCb.addEventListener('click', function(){
        boxDetailCbs.classList.add('active');
      });
    }

    for (const boxDetailCb of boxDetailCbs )
      boxDetailCb.classList.remove("active");
    };


    // let BtnMoreDetailCb = document.getElementById(
    //   "btn-show-more-detail-book-crud"
    // );
    // let boxDetailCbs = document.querySelectorAll(
    //   ".container-complete-detail-info-book"
    // );

    // BtnMoreDetailCb.addEventListener("click", function () {
    //   for (const boxDetailCb of boxDetailCbs) {
    //     boxDetailCb.classList.add("active");
    //   }
    // });

    // for (const boxDetailCb of boxDetailCbs) {
    //   boxDetailCb.classList.remove("active");
    // }