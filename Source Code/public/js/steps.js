function multipleSteps(stepBtn, firstBtn, secondBtn, stepSpan)
{
    stepBtn.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById(firstBtn).classList.add('hidden');
        document.getElementById(secondBtn).classList.remove('hidden');

        document.getElementById(stepSpan).classList.add('bg-gray-600');
        document.getElementById(stepSpan).classList.add('text-white');
    });
}
