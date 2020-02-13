
/**
 * Displays a confirmation dialog with a text prompt.
 * @param message the confirmation message.
 * @param ok a callback to be called when the user confirms the message
 * @param cancel a callback to be called when the user cancels the confirmation
 */
yii.confirm = function (message, ok, cancel) {
    var confirmCode = ok;
    var isConfirmed = window.prompt(message + '\n\n' + 'Enter \"' + confirmCode + '\" to confirm.') == confirmCode;
    if (isConfirmed) {
        !ok || ok();
    } else {
        !cancel || cancel();
    }
};
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
/**
 * Displays a confirmation dialog with a text prompt.
 * @param message the confirmation message.
 * @param ok a callback to be called when the user confirms the message
 * @param cancel a callback to be called when the user cancels the confirmation
 */
yii.confirm = function (message, ok, cancel) {
    var confirmCode = ok;
    var isConfirmed = window.prompt(message + '\n\n' + 'Enter \"' + confirmCode + '\" to confirm.') == confirmCode;
    if (isConfirmed) {
        !ok || ok();
    } else {
        !cancel || cancel();
    }
};