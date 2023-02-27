/**
 * the loading modal is attached at the layouts.master
 * - use case: when running an ajax function, we may want to show the loading screen
 *
 *  e.g.:
 *      $.ajax({ ...beforeProcess: showLoading() }).done( () => { hideLoadingModal() })
 *
 * sometimes we do things very dynamically, so in the case that the button and the modal are created on the go, then use the dynamic sections function
 * */
let showLoadingModal = function () {
    $('.loading-modal').modal('show')
}

let hideLoadingModal = function () {
    setTimeout(() => { $('.loading-modal').modal('hide') }, 1000);
}

let hideImmediatelyLoadingModal = function () {
    setTimeout(() => { $('.loading-modal').modal('hide') }, 10);
}

// * dynamic sections functions
let createLoadingModal = function () {
    return $('.loading-modal').clone().addClass('dynamic-loading-modal')
}

let showDynamicLoadingModal = function (modal) {
    modal.modal('show')
}

let removeDynamicLoadingModal = function (modal) {
    modal.modal('hide')
    modal.on('hidden.bs.modal', function () { $(this).remove() })
}
