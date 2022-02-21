class SearchModule {

    searchBarInput() {
        const searchBar = document.querySelector('#search_form_area input')
        searchBar.addEventListener('input', (e) => {
            let filter = undefined;
            const filterCheckbox = document.querySelector('.check_box.selected')
            if (filterCheckbox) filter = filterCheckbox.dataset.filter
            let searchValue = searchBar.value
            if ((searchValue.length > 2 && searchValue.slice(-1) !== ' ')
                ||
                e.inputType === 'deleteContentBackward') {
                this.searchSender(searchValue, filter).then(data => this.showData(data, filter))
            }
        })
    }

    async searchSender(searchValue, filter) {
        if (searchValue.trim().length === 0) {
            return ''
        }
        const response = await fetch('http://localhost:8283/search', {
            method: 'POST',
            body: JSON.stringify({searchValue: searchValue, filter: filter})
        })
        return await response.json()
    }

    showData(data, filter) {
        let column = 'Email'
        if (filter === 'departments') {
            column = 'Department'
        }else if (filter === 'regions'){
            column = 'Region'
        }
        let html = ``
        if (data.length === 0) {
            html = `<div class="nothing">Nothing found...</div>`
        } else {
            html += `
        <table id="results_table">
        <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>${column}</th>
        </tr>`
            data.forEach((val) => {
                html += `<tr>
            <td>${val.id}</td>
            <td>${val.username}</td>
            <td>${val.fullname}</td>`
                if (filter === 'departments') {
                    html += `<td>${val.department_name}</td>`
                } else if (filter === 'regions') {
                    html += `<td>${val.region_name}</td>`
                } else {
                    html += `<td>${val.email}</td>`
                }
                `</tr>`
            })
            html += `</table>`
        }
        const targetArea = document.querySelector('#search_result_area')
        targetArea.innerHTML = html
    }

}

export default SearchModule
