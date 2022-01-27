const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 5000,
    timerProgressBar:true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.addEventListener('hide-form',({detail:{type,message}})=>{
    $('#NewModal').modal('hide');
    Toast.fire({
        icon:type,
        title:message
    })
})

window.addEventListener('hide-school-fee-collector-form',({detail:{type,message}})=>{
    $('#SchoolFeeCollectorModal').modal('hide');
    Toast.fire({
        icon:type,
        title:message
    })
})

window.addEventListener('show-form', event => {
    $('#NewModal').modal('show');
})

window.addEventListener('school-fee-colloector-show-form', event => {
    $('#SchoolFeeCollectorModal').modal('show');
})

window.addEventListener('show-feeScheem-form', event => {
    $('#NewModalFeescheemMap').modal('show');
})

window.addEventListener('show-SchoolFeeCollector-form', event => {
    $('#SchoolFeeCollector').modal('show');
})

window.addEventListener('hide-feeScheem-form',({detail:{type,message}})=>{
    $('#NewModalFeescheemMap').modal('hide');
    Toast.fire({
        icon:type,
        title:message
    })
})
