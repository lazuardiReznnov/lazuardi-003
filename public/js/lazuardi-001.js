// trix editor
document.addEventListener('trix-file-accept', function (e) {
  e.preventDefault()
})

// image preview
function previewImage() {
  const image = document.querySelector('#image')
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block'

  const oFReader = new FileReader()
  oFReader.readAsDataURL(image.files[0])

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result
  }
}

// // slug categories

// // slug alternatif`
// const nama = document.querySelector('#nama')
// // const slug = document.querySelector('#slug')

// nama.addEventListener('change', function () {
//   let preslug = nama.value
//   preslug = preslug.replace(/ /g, '-')
//   slug.value = preslug.toLowerCase()
// })
