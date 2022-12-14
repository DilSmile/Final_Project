let slideIndex_maxim = 1;
showSlides_maxim(slideIndex_maxim);

function plusSlides_maxim(n) {
  showSlides_maxim(slideIndex_maxim += n);
}

function currentSlide_maxim(n) {
  showSlides_maxim(slideIndex_maxim = n);
}

function showSlides_maxim(n) {
  let i;
  let slides_maxim = document.getElementsByClassName("mySlides_maxim");
  if (n > slides_maxim.length) {
      slideIndex_maxim = 1
  }
  if (n < 1) {
      slideIndex_maxim = slides_maxim.length
  }
  for (i = 0; i < slides_maxim.length; i++) {
      slides_maxim[i].style.display = "none";
  }
  slides_maxim[slideIndex_maxim - 1].style.display = "flex";
}

document.querySelectorAll('.accordion_course_maxim').forEach((el) => {
    el.addEventListener('click', () => {
        
        let content_course_maxim = el.nextElementSibling;
  
        if(content_course_maxim.style.maxHeight) {
            document.querySelectorAll('.content_course_maxim').forEach((el) => el.style.maxHeight = null); // Close accordion item
        }
        else {
            document.querySelectorAll('.content_course_maxim').forEach((el) => el.style.maxHeight = null);
            content_course_maxim.style.maxHeight = content_course_maxim.scrollHeight + 'px';
        }
    })
  });

  class Slider {
    constructor (rangeElement, valueElement, options) {
      this.rangeElement = rangeElement
      this.valueElement = valueElement
      this.options = options
  
      this.rangeElement.addEventListener('input', this.updateSlider.bind(this))
    }
  
    init() {
      this.rangeElement.setAttribute('min', options.min)
      this.rangeElement.setAttribute('max', options.max)
      this.rangeElement.value = options.cur
  
      this.updateSlider()
    }
  
    // Format the money
    asMoney(value) {
      return '$' + parseFloat(value)
        .toLocaleString('en-US', { maximumFractionDigits: 2 })
    }
  
    generateBackground(rangeElement) {   
      if (this.rangeElement.value === this.options.min) {
        return
      }
  
      let percentage =  (this.rangeElement.value - this.options.min) / (this.options.max - this.options.min) * 100
      return 'background: linear-gradient(to right, #50299c, #7a00ff ' + percentage + '%, #d3edff ' + percentage + '%, #dee1e2 100%)'
    }
  
    updateSlider (newValue) {
      this.valueElement.innerHTML = this.asMoney(this.rangeElement.value)
      this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    }
  }
  
  let rangeElement = document.querySelector('.range [type="range"]')
  let valueElement = document.querySelector('.range .range__value span') 
  
  let options = {
    min: 1000,
    max: 2500,
    cur: 750
  }
  
  if (rangeElement) {
    let slider = new Slider(rangeElement, valueElement, options)
  
    slider.init()
  }


  let AllslideIndex = 1;
  showAllSlides(AllslideIndex);
  
  function plusSlides(n) {
    showAllSlides(AllslideIndex += n);
  }
  
  function currentSlide_number(n) {
    showAllSlides(AllslideIndex = n);
  }
  
  function showAllSlides(n) {
    let i;
    let slides = document.getElementsByClassName("reviewEmpl");
    let dots = document.getElementsByClassName("next_prev");
    if (n > slides.length) {AllslideIndex = 1}    
    if (n < 1) {AllslideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[AllslideIndex-1].style.display = "block";  
    dots[AllslideIndexx-1].className += " active";
  }