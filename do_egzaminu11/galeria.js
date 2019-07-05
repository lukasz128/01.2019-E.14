document.addEventListener("DOMContentLoaded", init);

function init()
{
	const psy = document.querySelectorAll(".psy");
	const kot = document.querySelector("#kot");
	const piesDuzy = document.querySelector("#pies-duzy");
	const kotDuzy = document.querySelector("#kot-duzy");

	const zmianaPsa = ["pies1-szary", "pies2-szary", "pies3-szary"];
	const przedZmianaPsa = ["pies1", "pies2", "pies3"];
    const zmianaKot = "kot1-szary";
    const przedZmianaKot = "kot1";
    
	for(let i=0;i<psy.length;i++){
		psy[i].addEventListener('click', () => {
			psy[i].src = `${przedZmianaPsa[i]}.jpg`;
			piesDuzy.src = `${przedZmianaPsa[i]}.jpg`;
		});
		psy[i].addEventListener('mouseover', () => {
			psy[i].src = `${zmianaPsa[i]}.jpg`;
		});
		psy[i].addEventListener('mouseout', () => {
			psy[i].src = `${przedZmianaPsa[i]}.jpg`;
		});
	}
    
    kot.addEventListener('click', () => {
    	kot.src = `${przedZmianaKot}.jpg`;
        kotDuzy.src = `${przedZmianaKot}.jpg`;
    });
    
    kot.addEventListener('mouseover', () => {
        kot.src = `${zmianaKot}.jpg`;
    });
    
    kot.addEventListener('mouseout', () => {
        kot.src = `${przedZmianaKot}.jpg`;
    });

}