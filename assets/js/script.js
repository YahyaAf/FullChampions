const Gk = document.getElementById("gk");
Gk.innerHTML = ''; 
const Lb = document.getElementById("lb");
Lb.innerHTML = ''; 
const CbLeft = document.getElementById("cbLeft");
CbLeft.innerHTML = ''; 
const CbRight = document.getElementById("cbRight");
CbRight.innerHTML = ''; 
const Rb = document.getElementById("rb");
Rb.innerHTML = ''; 
const CmfLeft = document.getElementById("cmfLeft");
CmfLeft.innerHTML = ''; 
const Dmf = document.getElementById("dmf");
Dmf.innerHTML = ''; 
const CmfRight = document.getElementById("cmfRight");
CmfRight.innerHTML = ''; 
const Lwf = document.getElementById("lwf");
Lwf.innerHTML = ''; 
const St = document.getElementById("st");
St.innerHTML = ''; 
const Rwf = document.getElementById("rwf");
Rwf.innerHTML = ''; 


let data = JSON.parse(localStorage.getItem("object")) || [];


const ReadAll = () => {
  data = JSON.parse(localStorage.getItem("object")) || [];
  
  let firstGkAdded = false;
  let firstLbAdded = false;
  let firstCbLeftAdded = false;
  let firstCbRightAdded = false;
  let firstRbAdded = false;
  let firstCmLeftAdded = false;
  let firstDmfAdded = false;
  let firstCmRightAdded = false;
  let firstLwAdded = false;
  let firstStAdded = false;
  let firstRwAdded = false;
  

  let changements = [];
  let changement = document.querySelectorAll('#changement');

  data.forEach((player) => {
    if (player.position === "GK" && !firstGkAdded) {
      Gk.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>GK</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
            <p class="font-semibold mt-2">${player.name}</p>
          </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Div</b></p>
            <p class="mb-0">${player.gkRatings.diving}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Han</b></p>
            <p class="mb-0">${player.gkRatings.handling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Kic</b></p>
            <p class="mb-0">${player.gkRatings.kicking}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ref</b></p>
            <p class="mb-0">${player.gkRatings.reflexes}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sp</b></p>
            <p class="mb-0">${player.gkRatings.speed}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pos</b></p>
            <p class="mb-0">${player.gkRatings.positioning}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstGkAdded = true;
    } else if (player.position === "LB" && !firstLbAdded) {
      Lb.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstLbAdded = true; 
    }else if (player.position === "CBleft" && !firstCbLeftAdded) {
      CbLeft.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>CB</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstCbLeftAdded = true; 
    }else if (player.position === "CBright" && !firstCbRightAdded) {
      CbRight.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>CB</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstCbRightAdded = true; 
    }else if (player.position === "RB" && !firstRbAdded) {
      Rb.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstRbAdded = true; 
    }else if (player.position === "CMFleft" && !firstCmLeftAdded) {
      CmfLeft.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>CM</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstCmLeftAdded = true; 
    }else if (player.position === "DMF" && !firstDmfAdded) {
      Dmf.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstDmfAdded = true; 
    }else if (player.position === "CMFright" && !firstCmRightAdded) {
      CmfRight.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>CM</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstCmRightAdded = true; 
    }else if (player.position === "LWF" && !firstLwAdded) {
      Lwf.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstLwAdded = true; 
    }else if (player.position === "ST" && !firstStAdded) {
      St.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstStAdded = true; 
    }else if (player.position === "RWF" && !firstRwAdded) {
      Rwf.innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
            <div class="text-center">
            <p class="mb-0 text-black"><b>Pac</b></p>
            <p class="mb-0">${player.playerRatings.pace}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Sho</b></p>
            <p class="mb-0">${player.playerRatings.shooting}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Ps</b></p>
            <p class="mb-0">${player.playerRatings.passing}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Dri</b></p>
            <p class="mb-0">${player.playerRatings.dribbling}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Def</b></p>
            <p class="mb-0">${player.playerRatings.defending}</p>
            </div>
            <div class="text-center">
            <p class="mb-0 text-black"><b>Phy</b></p>
            <p class="mb-0">${player.playerRatings.physical}</p>
            </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
            <img src="${player.logo}" alt="Flag" class="w-4 h-4">
            <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
      `;
      firstRwAdded = true; 
    } else {
      changements.push(player); 
    }
  });
  
  changements.forEach((player, index) => {
    if (changement[index]) {
      changement[index].innerHTML = `
        <p class="font-bold text-lg absolute px-2 py-1 mt-5">${player.rating}</p>
        <p style="font-size: small; color: black;" class="absolute px-2 py-1 mt-10"><b>${player.position}</b></p>

        <!-- Player Image and Name -->
        <div class="flex flex-col items-center mt-4">
          <div class="flex">
            <img src="${player.photo}" alt="" class="rounded-full w-16 h-16 ml-3">
            <div class="flex flex-col items-center">
              <i class="fas fa-ellipsis-v cursor-pointer text-gray-600 text-xl" id="option"></i>
              <div id= 'actionButton' class='flex flex-col hidden'>
                <button onclick="Delete('${player.name}')" class="text-red-500 text-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button onclick="Update('${player.id}')" class="text-orange-500 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          <p class="font-semibold mt-2">${player.name}</p>
        </div>

        <!-- Player Stats -->
        <div style="gap: 1.5px;" class="flex justify-between text-xs mt-2">
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Div" : "Pac"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.diving : player.playerRatings.pace}</p>
          </div>
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Han" : "Sho"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.handling : player.playerRatings.shooting}</p>
          </div>
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Kic" : "Ps"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.kicking : player.playerRatings.passing}</p>
          </div>
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Ref" : "Dri"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.reflexes : player.playerRatings.dribbling}</p>
          </div>
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Sp" : "Def"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.speed : player.playerRatings.defending}</p>
          </div>
          <div class="text-center">
            <p class="mb-0 text-black"><b>${player.position === "GK" ? "Pos" : "Phy"}</b></p>
            <p class="mb-0">${player.position === "GK" ? player.gkRatings.positioning : player.playerRatings.physical}</p>
          </div>
        </div>

        <!-- Flags -->
        <div class="flex justify-center gap-1">
          <img src="${player.logo}" alt="Flag" class="w-4 h-4">
          <img src="${player.flag}" alt="Flag" class="w-4 h-4">
        </div>
        
        
      `;
    }
  });

  // show option if need delete or update
  const options = document.querySelectorAll('#option');
  const actionButtons = document.querySelectorAll('#actionButton');

  options.forEach((option, index) => {
  option.addEventListener('click', () => {
    actionButtons[index].classList.toggle('hidden');
  });
  }); 

  console.log(changements); 
};


const Add = (event) => {
  event.preventDefault();
  if(validation()){
    // name
    const name = document.getElementById("name").value;
    // image
    const inputPhotosUrl = document.querySelector("#photo").value;
    // position
    const position = document.getElementById("position").value;
    // Nationality
    const nationality = document.getElementById("nationality").value;
    // image
    const inputFlagsUrl = document.querySelector("#flag").value;
    // club
    const club = document.getElementById("club").value;
    // logo
    const inputLogosUrl = document.querySelector("#logo").value;
    // Player Rating
    const ratingPlayer = document.getElementById("ratingPlayer").value;
    const pac = document.getElementById("pace").value;
    const sho = document.getElementById("shooting").value;
    const ps = document.getElementById("passing").value;
    const dri = document.getElementById("dribbling").value;
    const def = document.getElementById("defending").value;
    const phy = document.getElementById("physical").value;
    // Gk Rating
    const ratingGk = document.getElementById("ratingGk").value;
    const div = document.getElementById("diving").value;
    const han = document.getElementById("handling").value;
    const kic = document.getElementById("kicking").value;
    const ref = document.getElementById("reflexes").value;
    const sp = document.getElementById("speed").value;
    const pos = document.getElementById("positioning").value;
  
  
    const player = {
      id: Date.now().toString(),
      name: name,
      photo: inputPhotosUrl,
      position: position,
      nationality: nationality,
      flag: inputFlagsUrl,
      club: club,
      logo: inputLogosUrl,
      rating: position === "GK" ? ratingGk : ratingPlayer,
    };
    if (position === "GK") {
      player.gkRatings = {
        diving: div,
        handling: han,
        kicking: kic,
        reflexes: ref,
        speed: sp,
        positioning: pos,
      };
    } else {
      player.playerRatings = {
        pace: pac,
        shooting: sho,
        passing: ps,
        dribbling: dri,
        defending: def,
        physical: phy,
      };
    }
  
    data.push(player);
  
    localStorage.setItem("object", JSON.stringify(data));
    reset();
    ReadAll();
  }
};

// show rating de players if gk or player
const divGk = document.getElementById("divGk"); 
const divPlayer = document.getElementById("divPlayer");
const position = document.getElementById("position"); 

position.addEventListener('change', () => {
  const selectedPos = position.value;

  if (selectedPos === 'GK') {
    divGk.classList.remove('hidden');
    divPlayer.classList.add('hidden');
  } else {
    divGk.classList.add('hidden'); 
    divPlayer.classList.remove('hidden');
  }
});


// reset forms
const reset = () => {

  document.getElementById("name").value = "";
  document.querySelector("#photo").value = "";
  document.getElementById("position").value = document.getElementById("position").options[0].value;
  document.getElementById("nationality").value = "";
  document.querySelector("#flag").value = "";
  document.getElementById("club").value = "";
  document.querySelector("#logo").value = "";
  document.getElementById("ratingPlayer").value = "";
 
  document.getElementById("pace").value = "";
  document.getElementById("shooting").value = "";
  document.getElementById("passing").value = "";
  document.getElementById("dribbling").value = "";
  document.getElementById("defending").value = "";
  document.getElementById("physical").value = "";

  document.getElementById("ratingGk").value = "";
  document.getElementById("diving").value = "";
  document.getElementById("handling").value = "";
  document.getElementById("kicking").value = "";
  document.getElementById("reflexes").value = "";
  document.getElementById("speed").value = "";
  document.getElementById("positioning").value = "";
};

// delete data 
const Delete = (playerName) => {
  if (confirm("Are you sure you want to delete this player?")) {
    const playerIndex = data.findIndex(player => player.name === playerName);

    if (playerIndex !== -1) {

      data.splice(playerIndex, 1);

      localStorage.setItem("object", JSON.stringify(data));

      ReadAll();
    } else {
      alert("Player not found!");
    }
  }
  location.reload();
};

// update data 
const Update = (playerId) => {
  const playerIndex = data.findIndex(player => player.id === playerId);
  const submit = document.getElementById('submit');
  const update = document.getElementById('update');
  const cancel = document.getElementById('cancel');

  submit.classList.add('hidden');
  cancel.classList.remove('hidden');
  update.classList.remove('hidden');

  cancel.addEventListener('click',function(){
    submit.classList.remove('hidden');
    cancel.classList.add('hidden');
    update.classList.add('hidden');
    reset();
  });

  if (playerIndex !== -1) {

    document.getElementById('name').value = data[playerIndex].name;
    document.getElementById('photo').value = data[playerIndex].photo;
    document.getElementById('position').value = data[playerIndex].position;
    document.getElementById('nationality').value = data[playerIndex].nationality;
    document.getElementById('flag').value = data[playerIndex].flag;
    document.getElementById('club').value = data[playerIndex].club;
    document.getElementById('logo').value = data[playerIndex].logo;
    
    const divGk = document.getElementById("divGk");
    const divPlayer = document.getElementById("divPlayer");

    if (data[playerIndex].position === 'GK') {
      divGk.classList.remove('hidden');
      divPlayer.classList.add('hidden');
      document.getElementById('ratingGk').value = data[playerIndex].rating ||'';
      document.getElementById('diving').value = data[playerIndex].gkRatings.diving ||'';
      document.getElementById('handling').value = data[playerIndex].gkRatings.handling ||'';
      document.getElementById('kicking').value = data[playerIndex].gkRatings.kicking ||'';
      document.getElementById('reflexes').value = data[playerIndex].gkRatings.reflexes ||'';
      document.getElementById('speed').value = data[playerIndex].gkRatings.speed ||'';
      document.getElementById('positioning').value = data[playerIndex].gkRatings.positioning ||'';
    } else {
      divGk.classList.add('hidden');
      divPlayer.classList.remove('hidden');
      
      document.getElementById('ratingPlayer').value = data[playerIndex].rating ||''; 
      document.getElementById('pace').value = data[playerIndex].playerRatings.pace || '';
      document.getElementById('shooting').value = data[playerIndex].playerRatings.shooting || '';
      document.getElementById('passing').value = data[playerIndex].playerRatings.passing || '';
      document.getElementById('dribbling').value = data[playerIndex].playerRatings.dribbling || '';
      document.getElementById('defending').value = data[playerIndex].playerRatings.defending || '';
      document.getElementById('physical').value = data[playerIndex].playerRatings.physical || '';
    }

    document.getElementById('update').onclick = () => {
      if (validation()) {
        data[playerIndex].name = document.getElementById('name').value;
        data[playerIndex].photo = document.getElementById('photo').value;
        data[playerIndex].position = document.getElementById('position').value;
        data[playerIndex].nationality = document.getElementById('nationality').value;
        data[playerIndex].flag = document.getElementById('flag').value;
        data[playerIndex].club = document.getElementById('club').value;
        data[playerIndex].logo = document.getElementById('logo').value;

        if (data[playerIndex].position === 'GK') {
          if (!data[playerIndex].gkRatings) {
            data[playerIndex].gkRatings = {
              diving: '',
              handling: '',
              kicking: '',
              reflexes: '',
              speed: '',
              positioning: '',
            };
          }

          data[playerIndex].rating = document.getElementById('ratingGk').value;
          data[playerIndex].gkRatings.diving = document.getElementById('diving').value;
          data[playerIndex].gkRatings.handling = document.getElementById('handling').value;
          data[playerIndex].gkRatings.kicking = document.getElementById('kicking').value;
          data[playerIndex].gkRatings.reflexes = document.getElementById('reflexes').value;
          data[playerIndex].gkRatings.speed = document.getElementById('speed').value;
          data[playerIndex].gkRatings.positioning = document.getElementById('positioning').value;

          delete data[playerIndex].playerRatings;
        } else {
          if (!data[playerIndex].playerRatings) {
            data[playerIndex].playerRatings = {
              pace: '',
              shooting: '',
              passing: '',
              dribbling: '',
              defending: '',
              physical: '',
            };
          }

          data[playerIndex].rating = document.getElementById('ratingPlayer').value;
          data[playerIndex].playerRatings.pace = document.getElementById('pace').value;
          data[playerIndex].playerRatings.shooting = document.getElementById('shooting').value;
          data[playerIndex].playerRatings.passing = document.getElementById('passing').value;
          data[playerIndex].playerRatings.dribbling = document.getElementById('dribbling').value;
          data[playerIndex].playerRatings.defending = document.getElementById('defending').value;
          data[playerIndex].playerRatings.physical = document.getElementById('physical').value;

          delete data[playerIndex].gkRatings;
        }

        // Save the updated data to local storage
        localStorage.setItem('object', JSON.stringify(data));
        submit.classList.remove('hidden');
        cancel.classList.add('hidden');
        update.classList.add('hidden');
        reset();
        ReadAll();
        alert("Player updated successfully!");
        location.reload();
      }
    };
  }
};

const validation = () => {
  let condition = true;

  // Name
  const name = document.getElementById("name");
  const erreurName = document.getElementById('erreurName');;
  if (name.value.trim() === "") {
    erreurName.classList.remove('hidden');
    condition = false;
  } else {
    erreurName.classList.add('hidden');
  }
  const nameReg = /^[a-zA-Z]{1,20}$/;
  if (!nameReg.test(name.value)) {
    erreurName.classList.remove('hidden');
    condition = false;
  } else {
    erreurName.classList.add('hidden');
  }
  // Photo
  const photo = document.getElementById("photo");
  const erreurPhoto = document.getElementById("erreurPhoto");
  if (photo.value.trim() === "") {
    erreurPhoto.classList.remove('hidden');
    condition = false;
  } else {
    erreurPhoto.classList.add('hidden');
  }
  const photoReg = /^(https:\/\/|http:\/\/)\S+\.png$/;
  if (!photoReg.test(photo.value)) {
    erreurPhoto.classList.remove('hidden');
    condition = false;
  } else {
    erreurPhoto.classList.add('hidden');
  }

  // Position
  const position = document.getElementById("position");
  if (position.value.trim() === "Please select") {
    alert("Erreur de position");
    position.classList.remove("border-green-500");
    position.classList.add("border-red-500");
    condition = false;
  } else {
    position.classList.remove("border-red-500");
    position.classList.add("border-green-500");
    
    // Validate ratings de Gk et Player 
    if (position.value.toLowerCase() === "gk") {
      const gkRatings = ["ratingGk", "diving", "handling", "kicking", "reflexes", "speed", "positioning"];
      gkRatings.forEach((id) => {
        const field = document.getElementById(id);
        if (field.value.trim() === "") {
          field.classList.remove("border-green-500");
          field.classList.add("border-red-500");
          condition = false;
        } else {
          field.classList.remove("border-red-500");
        }
        const fieldReg = /^(10|[1-9][0-9])$/;;
        if (!fieldReg.test(field.value)) {
          field.classList.remove("border-green-500");
          field.classList.add("border-red-500");
          condition = false;
        } else {
          field.classList.remove("border-red-500");
        }
      });
    }else{
      const playerRatings = ["ratingPlayer", "pace", "shooting", "passing", "dribbling", "defending", "physical"];
      playerRatings.forEach((id) => {
        const field = document.getElementById(id);
        if (field.value.trim() === "") {
          field.classList.remove("border-green-500");
          field.classList.add("border-red-500");
          condition = false;
        } else {
          field.classList.remove("border-red-500");
        }
        const fieldReg = /^(10|[1-9][0-9])$/;;
        if (!fieldReg.test(field.value)) {
          field.classList.remove("border-green-500");
          field.classList.add("border-red-500");
          condition = false;
        } else {
          field.classList.remove("border-red-500");
        }
      });
    } 
  }

  // Nationality
  const nationality = document.getElementById("nationality");
  const erreurNationality = document.getElementById("erreurNationality");
  if (nationality.value.trim() === "") {
    erreurNationality.classList.remove('hidden');
    condition = false;
  } else {
    erreurNationality.classList.add('hidden');
  }
  const nationalityReg = /^[a-zA-Z]{3,30}$/;
  if (!nationalityReg.test(nationality.value)) {
    erreurNationality.classList.remove('hidden');
    condition = false;
  } else {
    erreurNationality.classList.add('hidden');
  }

  // Flag
  const flag = document.getElementById("flag");
  const erreurFlag = document.getElementById("erreurFlag");
  if (flag.value.trim() === "") {
    erreurFlag.classList.remove('hidden');
    condition = false;
  } else {
    erreurFlag.classList.add('hidden');
  }
  const flagReg = /^(https:\/\/|http:\/\/)\S+\.png$/;
  if (!flagReg.test(flag.value)) {
    erreurFlag.classList.remove('hidden');
    condition = false;
  } else {
    erreurFlag.classList.add('hidden');
  }

  // Club
  const club = document.getElementById("club");
  const erreurClub = document.getElementById("erreurClub");
  if (club.value.trim() === "") {
    erreurClub.classList.remove('hidden');
    condition = false;
  } else {
    erreurClub.classList.add('hidden');
  }
  const clubReg = /^[a-zA-Z]{3,25}$/;
  if (!clubReg.test(club.value)) {
    erreurClub.classList.remove('hidden');
    condition = false;
  } else {
    erreurClub.classList.add('hidden');
  }

  // Logo
  const logo = document.getElementById("logo");
  const erreurLogo = document.getElementById("erreurLogo");
  if (logo.value.trim() === "") {
    erreurLogo.classList.remove('hidden');
    condition = false;
  } else {
    erreurLogo.classList.add('hidden');
  }
  const logoReg = /^(https:\/\/|http:\/\/)\S+\.png$/;
  if (!logoReg.test(logo.value)) {
    erreurLogo.classList.remove('hidden');
    condition = false;
  } else {
    erreurLogo.classList.add('hidden');
  }
  

  return condition; 
};


const player = document.querySelectorAll('.parent-player .mt-5');
let somme = 0
const Values = player.forEach((p) => {somme+=parseInt(p.textContent)});
console.log(somme)
console.log(somme/11);