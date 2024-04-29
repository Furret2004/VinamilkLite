// import React from "react";

// function NewsPage() {
//   const [showModal, setShowModal] = React.useState(false);
//   return (
//     <div className="justify-center items-center content-center">
//       <button
//         className="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
//         type="button"
//         onClick={() => setShowModal(true)}
//       >
//         Xem thêm
//       </button>
//       {showModal ? (
//         <>
//           <div
//             className="justify-center items-center flex overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none"
//           >
//             <div className="relative w-auto my-6 mx-auto max-w-3xl">
//               {/*content*/}
//               <div className="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
//                 {/*header*/}
//                 <div className="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
//                   <h3 className="text-3xl font-semibold">
//                     Modal Title
//                   </h3>
//                   <button
//                     className="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
//                     onClick={() => setShowModal(false)}
//                   >
//                     <span className="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
//                       ×
//                     </span>
//                   </button>
//                 </div>
//                 {/*body*/}
//                 <div className="relative p-6 flex-auto">
//                   <p className="my-4 text-blueGray-500 text-lg leading-relaxed">
//                   VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
//                   </p>
//                 </div>
//                 {/*footer*/}
//                 <div className="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
//                   <button
//                     className="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
//                     type="button"
//                     onClick={() => setShowModal(false)}
//                   >
//                     Close
//                   </button>
//                   <button
//                     className="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
//                     type="button"
//                     onClick={() => setShowModal(false)}
//                   >
//                     Save Changes
//                   </button>
//                 </div>
//               </div>
//             </div>
//           </div>
//           <div className="opacity-25 fixed inset-0 z-40 bg-black"></div>
//         </>
//       ) : null}
//     </div>
//   );
// }

function NewsPage() {
  return (
    <div className='flex items-center justify-center min-h-screen flex-col'>
      <div className='w-1/2 md:w-32 lg:w-48 p-6 m-2 justify-self-auto min-h-3/4 rounded-lg text-6xl text-blue-500 text-center font-bold'>
        <p>TIN TỨC & SỰ KIỆN</p>
      </div>
      <div className='flex items-center justify-center flex-col'>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2 rounded-lg" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2 rounded-lg" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2 rounded-lg" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2 rounded-lg" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2 rounded-lg" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        <div className='flex flex-row text-blue-500'>
          <img className="h-24 w-48 p-2" src="download.png"></img>
          <p>
          VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO
          </p>
        </div>
        
      </div>
    </div>
  );
}

export default NewsPage;
