import { MainLayout } from '../../components/layout';
import HeroImage from '../../assets/images/hero-image.jpg';
import { AlternatingStripes } from '../../components/common';
import { useEffect } from 'react';
import { userApi } from '../../api';

function HomePage() {
  useEffect(() => {
    (async () => {
      const data = await userApi.getAllUsers();
      console.log(data);
    })();
  }, []);

  return (
    <MainLayout hasTransitionHeader>
      <section id="hero">
        <div className="relative">
          <img className="max-h-screen w-full object-cover" src={HeroImage} alt="Hero" />
          <div className="absolute w-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center font-vsd-bold text-[8rem] lg:text-[5rem] md:text-[3rem] sm:text-[2.5rem] text-secondary uppercase leading-[0.94] lg:leading-[0.95]">
            <p>để tâm. đổi mới</p>
            <p>để tâm. Sáng tạo</p>
            <p>luôn là thế</p>
            <p>từ 1976</p>
          </div>
          <div className="absolute w-full bottom-0 left-0 h-[26px]">
            <AlternatingStripes firstColor="transparent" secondColor="#D3E1FF" stripeWith={4} />
          </div>
        </div>
      </section>
      <div className="h-[2000px]"></div>
    </MainLayout>
  );
}

export default HomePage;
