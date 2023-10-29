const AllSideBar = document.querySelectorAll('.navigation .sidebar-menu ul li a');


AllSideBar.forEach(item=> {
    item.addEventListener('click', function() {
        AllSideBar.forEach(i=> {
            i.classList.remove('active');
        })
        item.classList.add('active');
    })
});

