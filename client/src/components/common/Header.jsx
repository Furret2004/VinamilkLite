import { useState, useEffect } from 'react';
import PropTypes from 'prop-types';
import Logo from '../../assets/images/vinamilk-logo.svg';
import WhiteLogo from '../../assets/images/vinamilk-white-logo.svg';

function Header({ hasTransiton = false }) {
  const [className, setClassName] = useState(
    'h-[80px] lg:h-[72px] bg-transparent lg:bg-secondary border-0 lg:border-b text-secondary'
  );
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY < 40) {
        setClassName(
          'h-[80px] lg:h-[72px] bg-transparent lg:bg-secondary border-0 lg:border-b text-secondary lg:text-primary'
        );
        setScrolled(false);
      } else {
        setClassName('h-[72px] bg-secondary border-b text-primary');
        setScrolled(true);
      }
    };

    if (hasTransiton) {
      window.addEventListener('scroll', handleScroll);
      return () => window.removeEventListener('scroll', handleScroll);
    }
  }, [hasTransiton]);

  return (
    <header id="header" className="fixed lg:sticky top-0 left-0 w-full z-30">
      <div className={`relative flex items-center transition-all border-primary ${className}`}>
        <div className="container-sm px-5 lg:px-4 flex items-center justify-between text-lg font-vs-std transition-all">
          <div className="flex">
            <div className="cursor-pointer p-1 w-8 h-8 hidden lg:block">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                stroke="currentColor"
                className="transition-all"
              >
                <title>Menu</title>
                <line x1="2.25" y1="6.25" x2="21.75" y2="6.25" strokeWidth="1.5"></line>
                <line x1="2.25" y1="11.25" x2="21.75" y2="11.25" strokeWidth="1.5"></line>
                <line x1="2.25" y1="16.25" x2="21.75" y2="16.25" strokeWidth="1.5"></line>
              </svg>
            </div>
            <a className="lg:hidden" href="/about-us">
              Giới thiệu
            </a>
            <a className="ml-5 lg:hidden" href="/collections/all-products">
              Sản phẩm
            </a>
          </div>
          <a className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" href="/">
            <img
              className="w-[122px] lg:w-[98px] h-[40px] md:h-[32px] object-fill lg:hidden"
              src={scrolled ? Logo : WhiteLogo}
              alt="Vinamilk"
            />
            <img
              className="w-[122px] lg:w-[98px] h-[40px] md:h-[32px] object-fill hidden lg:block"
              src={Logo}
              alt="Vinamilk"
            />
          </a>
          <div className="flex">
            <a className="px-3 lg:hidden" href="/news">
              Tin tức
            </a>
            <a className="px-3 lg:hidden" href="/account/login">
              Đăng nhập
            </a>
            <div className="cursor-pointer flex items-center justify-center w-6 h-6 ml-3 mr-2">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                className="transition-all"
              >
                <path
                  d="M11.5002 21.75C5.85024 21.75 1.25024 17.15 1.25024 11.5C1.25024 5.85 5.85024 1.25 11.5002 1.25C17.1502 1.25 21.7502 5.85 21.7502 11.5C21.7502 17.15 17.1502 21.75 11.5002 21.75ZM11.5002 2.75C6.67024 2.75 2.75024 6.68 2.75024 11.5C2.75024 16.32 6.67024 20.25 11.5002 20.25C16.3302 20.25 20.2502 16.32 20.2502 11.5C20.2502 6.68 16.3302 2.75 11.5002 2.75Z"
                  fill="currentColor"
                ></path>
                <path
                  d="M22.0002 22.7499C21.8102 22.7499 21.6202 22.6799 21.4702 22.5299L19.4702 20.5299C19.1802 20.2399 19.1802 19.7599 19.4702 19.4699C19.7602 19.1799 20.2402 19.1799 20.5302 19.4699L22.5302 21.4699C22.8202 21.7599 22.8202 22.2399 22.5302 22.5299C22.3802 22.6799 22.1902 22.7499 22.0002 22.7499Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <div className="cursor-pointer flex items-center justify-center w-6 h-6 mx-2">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                className="transition-all"
              >
                <path
                  d="M16.4899 22.75H7.49993C5.77993 22.75 4.48994 22.29 3.68994 21.38C2.88994 20.47 2.57993 19.15 2.78993 17.44L3.68994 9.94C3.94994 7.73 4.50994 5.75 8.40994 5.75H15.6099C19.4999 5.75 20.0599 7.73 20.3299 9.94L21.2299 17.44C21.4299 19.15 21.1299 20.48 20.3299 21.38C19.4999 22.29 18.2199 22.75 16.4899 22.75ZM8.39993 7.25C5.51993 7.25 5.37993 8.38999 5.16993 10.11L4.26994 17.61C4.11994 18.88 4.29993 19.81 4.80993 20.38C5.31993 20.95 6.21993 21.24 7.49993 21.24H16.4899C17.7699 21.24 18.6699 20.95 19.1799 20.38C19.6899 19.81 19.8699 18.88 19.7199 17.61L18.8199 10.11C18.6099 8.37999 18.4799 7.25 15.5899 7.25H8.39993Z"
                  fill="currentColor"
                ></path>
                <path
                  d="M16 8.75C15.59 8.75 15.25 8.41 15.25 8V4.5C15.25 3.42 14.58 2.75 13.5 2.75H10.5C9.42 2.75 8.75 3.42 8.75 4.5V8C8.75 8.41 8.41 8.75 8 8.75C7.59 8.75 7.25 8.41 7.25 8V4.5C7.25 2.59 8.59 1.25 10.5 1.25H13.5C15.41 1.25 16.75 2.59 16.75 4.5V8C16.75 8.41 16.41 8.75 16 8.75Z"
                  fill="currentColor"
                ></path>
                <path
                  d="M20.41 17.7793H8C7.59 17.7793 7.25 17.4393 7.25 17.0293C7.25 16.6193 7.59 16.2793 8 16.2793H20.41C20.82 16.2793 21.16 16.6193 21.16 17.0293C21.16 17.4393 20.82 17.7793 20.41 17.7793Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </header>
  );
}

Header.propTypes = {
  hasTransiton: PropTypes.bool,
};

export default Header;