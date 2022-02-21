class AdditinalFilters {

    constructor() {
        this.checkboxesSwitch()
        this.resetFilters()
    }

    checkboxesSwitch() {
        const checkBoxes = document.querySelectorAll('.check_box')
        checkBoxes.forEach((element) => {
            element.addEventListener('click', () => {
                checkBoxes.forEach(e => {
                    if (e.classList.contains('selected')) e.classList.remove('selected')
                })
                element.classList.add('selected')
            })
        })
    }
    resetFilters(){
        const button = document.querySelector('.reset_filters_button')
        button.addEventListener('click',()=>{
            const checkBox = document.querySelector('.check_box.selected')
            if(checkBox) checkBox.classList.remove('selected')
        })

    }
}

export default AdditinalFilters
