<script>
    function confirmDeleTe(delUrl) {
        if (confirm("Bạn có muốn xóa không ?")) {
            document.location = delUrl;
        }
    }

    const productList = document.querySelectorAll('.product-list tr');
    const itemsPerPage = 5; // Số sản phẩm trên mỗi trang
    let currentPage = 1; // Trang hiện tại

    // Tạo liên kết phân trang tự động
    function createPaginationLinks() {
        const pageCount = Math.ceil(productList.length / itemsPerPage);
        const paginationDiv = document.getElementById('pagination');
        paginationDiv.innerHTML = '';

        for (let i = 1; i <= pageCount; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.textContent = i;
            paginationDiv.appendChild(pageLink);

            pageLink.addEventListener('click', () => {
                currentPage = i;
                showPage(currentPage);
            });
        }
    }

    // Hiển thị sản phẩm trên trang cụ thể
    function showPage(pageNumber) {
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        productList.forEach((product, index) => {
            if (index >= startIndex && index < endIndex) {
                product.style.display = 'table-row';
            } else {
                product.style.display = 'none';
            }
        });
    }

    // Gọi hàm tạo liên kết phân trang và hiển thị trang ban đầu
    createPaginationLinks();
    showPage(currentPage);
</script>