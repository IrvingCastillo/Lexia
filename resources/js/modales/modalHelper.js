export function showModal(modal, delay = 0, callback) {
  if (delay > 0) {
    setTimeout(() => { modal.show(); callback?.(); }, delay)
  } else {
    modal.show(); callback?.();
  }
}

export function hideModal(modal, delay = 0, callback) {
  if (delay > 0) {
    setTimeout(() => { modal.hide(); callback?.(); }, delay)
  } else {
    modal.hide(); callback?.();
  }
}

export function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms))
}
