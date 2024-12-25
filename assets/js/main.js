// Hàm hover header

const hoverProduct = document.getElementsByClassName('drop-down-list')[0];
const hoverMale = document.getElementsByClassName('drop-down-list')[1];
const hoverFemale = document.getElementsByClassName('drop-down-list')[2];


const hoverTable = document.getElementsByClassName('show')[0];
console.log(hoverProduct);
console.log(hoverMale);
console.log(hoverFemale);

// Thêm nhiều sự kiện 


hoverProduct.addEventListener('mouseover', function () {
    hoverTable.style.display = 'block';
});

hoverProduct.addEventListener('mouseout', function () {
    hoverTable.style.display = 'none';
});


// hover  IN PAGE SHOES  
